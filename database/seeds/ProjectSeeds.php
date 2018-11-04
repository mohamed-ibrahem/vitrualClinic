<?php

use Illuminate\Database\Seeder;

class ProjectSeeds extends Seeder
{
    /**
     * @project VirtualClinic
     */
    public function run()
    {
        $this->roles();
        $this->createAdmin();
        $this->createSpecialities();
        $this->createDoctor();
        $this->createMembers();
    }

    /**
     * @project VirtualClinic
     */
    private function roles()
    {
        \App\Role::insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrator'
            ],

            [
                'name' => 'doctor',
                'display_name' => 'Doctor'
            ],

            [
                'name' => 'member',
                'display_name' => 'Member'
            ]
        ]);
    }

    /**
     * @project VirtualClinic
     */
    private function createAdmin()
    {
        \App\Role::Admins()->user()->create([
            'name' => 'Admin',
            'email' => 'admin@system.app',
            'password' => bcrypt('admin'),
            'info' => []
        ]);
    }

    /**
     * @project VirtualClinic
     */
    private function createMembers()
    {
        $members = [];

        for ($i = 1; $i <= 100; $i++) {
            $members[] = [
                'name' => 'Member ' . $i,
                'email' => 'member'. $i .'@system.app',
                'password' => bcrypt('member'),
                'info' => [
                    'gender' => rand(0, 1)
                ],
                'created_at' => now()->subDays(rand(00, 89))->timestamp
            ];
        }

        \App\Role::Members()->user()->createMany($members);
    }

    /**
     * @project VirtualClinic
     */
    private function createDoctor()
    {
        $count = \App\Speciality::pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            \App\Role::Doctors()->user()->create([
                'name' => 'Doctor ' . $i,
                'email' => 'doctor'. $i .'@system.app',
                'password' => bcrypt('doctor'),
                'info' => [],
                'created_at' => now()->subDays(rand(00, 89))->timestamp
            ])->specialities()->sync([$count->random()]);
        }
    }

    private function createSpecialities()
    {
        $_specialities = collect([
            'Obstetrician And Gynaecologists',
            'General Medicine Physicians',
            'Psychiatrists',
            'Dermatologists',
            'Dentists',
            'Paediatricians',
            'Sexologists',
            'Orthopaedician And Traumatologists',
            'Eye Care Ophthalmologists',
            'General Practitioners',
            'Cardiologists',
            'Medical Gastroenterologists',
            'Urologists',
            'Endocrinologists',
            'Neurologists',
            'ENT Otolaryngologists',
            'Family Physicians',
            'Ayurveda Specialists',
            'Pulmonologists',
            'Psychologist Counsellors',
            'HIV AIDS Specialists',
            'Nutritionists',
            'General Surgeons',
            'Child Health Specialists',
            'Homeopathic Physicians',
            'Dieticians',
            'Diabetologists',
            'Fitness Experts',
            'Surgical Oncologists',
            'Radiologists',
            'Nephrologists',
            'Hematologists',
            'Sleep Medicine Physicians',
            'Siddha Medicine Specialists',
            'Rheumatologists',
            'Spine Health Specialists',
            'Oral Implantologists',
            'Pharmacologists',
            'Pedodontists',
            'Radiodiagnosis Physicians',
            'Audiologists',
            'Surgical Gastroenterologists',
            'Medical Oncologists',
            'Physiotherapists',
            'Criticalcare Physicians',
            'Andrologists',
            'Cosmetologists',
            'Childbirth Educators',
            'Radiation Oncologists',
            'Allergy Specialists',
            'Microbiologists',
            'Yoga Specialists',
            'Internal Medicine Physicians',
            'Pain Medicine Physicians',
            'Vascular Surgeons',
            'Anesthesiologists',
            'Neuro Surgeons',
            'Geriatricians',
            'Orthodontists',
            'Hair Transplant Surgeons',
            'Psychotherapists',
            'Plastic Surgeons',
            'Preventive Medicine Physicians',
            'Paediatric Surgeons',
            'Venereologists',
            'Cardiothoracic Surgeons',
            'Interventional Radiologists',
            'Spine Surgeons',
            'Endodontists',
            'Toxicologists',
            'Maxillofacial Prosthodontists',
            'Lactation Counselors',
            'Pathologists',
            'Naturopathy Specialists',
            'Periodontists',
            'Pediatric Allergy Asthma Specialists',
            'Speech Therapists',
            'Radiotherapists',
            'Infertility Specialists',
            'Fetal Medicine Specialists',
            'Nuclear Medicine Physicians',
            'Chiropractors',
            'Community Medicine Physicians',
            'Forensic Medicine Physicians'
        ]);

        \App\Speciality::insert($_specialities->map(function($speciality) {
            return [
                'name' => str_slug($speciality),
                'display_name' => $speciality
            ];
        })->all());
    }
}
