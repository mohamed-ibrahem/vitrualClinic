<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\TranslationManager\Manager;
use Illuminate\Http\Request;
use Barryvdh\TranslationManager\Models\Translation;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class TranslationsController extends Controller
{

    /** @var \Barryvdh\TranslationManager\Manager */
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function getIndex()
    {
        $locales = $this->manager->getLocales();
        $groups = Translation::groupBy('group');
        $excludedGroups = $this->manager->getConfig('exclude_groups');
        if ($excludedGroups)
            $groups->whereNotIn('group', $excludedGroups);

        $groups = $groups->select('group')->orderBy('group')->get()->pluck('group', 'group');
        if ($groups instanceof Collection)
            $groups = $groups->all();

        foreach (Translation::orderBy('key', 'asc')->get() as $translation) {
            $translations[$translation->group][$translation->key][$translation->locale] = $translation;
        }

        return view('admin.translation')
            ->with('translations', $translations)
            ->with('locales', $locales)
            ->with('groups', $groups);
    }

    protected function loadLocales()
    {
        //Set the default locale as the first one.
        $locales = Translation::groupBy('locale')
            ->select('locale')
            ->get()
            ->pluck('locale');

        if ($locales instanceof Collection) {
            $locales = $locales->all();
        }
        $locales = array_merge([config('app.locale')], $locales);
        return array_unique($locales);
    }

    public function postEdit($group = null)
    {
        if (!in_array($group, $this->manager->getConfig('exclude_groups'))) {
            $name = request()->get('name');
            $value = request()->get('value');

            list($locale, $key) = explode('|', $name, 2);
            $translation = Translation::firstOrNew([
                'locale' => $locale,
                'group' => $group,
                'key' => $key,
            ]);
            $translation->value = (string)$value ?: null;
            $translation->status = Translation::STATUS_CHANGED;
            $translation->save();
            return array('status' => 'ok');
        }
    }

    public function postImport(Request $request)
    {
        $this->manager->truncateTranslations();
        $counter = $this->manager->importTranslations(true);

        return ['status' => 'ok', 'counter' => $counter];
    }

    public function postPublish()
    {
        $json = false;

        foreach (Translation::groupBy('group')->select('group')->orderBy('group')->get() as $group) {
            if ($group === '_json')
                $json = true;

            $this->manager->exportTranslations($group->group, $json);
        }

        return ['status' => 'ok'];
    }
}
