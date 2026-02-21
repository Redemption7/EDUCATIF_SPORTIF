<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        $sports = [
            'Football',
            'Basketball',
            'Volleyball',
            'Tennis',
            'Athletics',
            'Swimming',
            'Badminton',
            'Table Tennis',
            'Martial Arts',
            'Cricket'
        ];

        $data = [
            'projectName' => 'NK EDUCATIF SPORTIF',
            'sports' => $sports,
            'about' => 'NK EDUCATIF SPORTIF Founded in April 2025 is dedicated to providing a safe, inclusive, environmental sports culture for all ages.',
            'mission' => 'Empower Minds through Sports and Education. To provide a quality yearly sports training program for youths and adults competition leagues across Africa.',
            'unifyMission' => 'NKES biggest mission is to unify the continent of Africa through sports. We believe that sports are more than just a game, sports will help build friendships, unity and love. Our commitment is to ensure that every child across Africa has the opportunity to join the NKES to learn and play sports.',
            'vision' => 'To be the premier pan-African sports academy, harnessing the unifying power of sports to bridge cultural and national divides, foster mutual understanding, and empower the next generation of African leaders.',
            'visionPoints' => [
                'Promote sports excellence and development across Africa',
                'Foster cross-cultural exchange and collaboration among athletes, coaches, and officials',
                'Develop leadership and life skills through sports',
                'Support African athletes in international competitions',
                'Encourage social cohesion and unity through sports events and initiatives'
            ],
            'objectives' => [
                'Offering recreational and competitive leagues within Africa for all skill levels',
                'Build different strongest African teams in all sports activities and give them the opportunity to represent the continent of Africa',
                'Foster a culture of zero tolerance for sexual abuse, harassment, and gender-based violence in sports',
                'Promote gender equality and inclusivity in sports',
                'Develop the whole child through sports and character development'
            ]
        ];

        return view('home', $data);
    }
}
