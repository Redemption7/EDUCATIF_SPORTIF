<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        // full list pulled from project document
        $sports = [
            'Basketball',
            'Soccer',
            'Handball',
            'Netball',
            'Volleyball',
            'Tennis',
            'Table Tennis',
            'Badminton',
            'Baseball5',
            'Baseball',
            'Softball',
            'Hockey',
            'Flag Football',
            'Cricket'
            // etc. can be added as needed
        ];

        // dynamic statistics
        // if database is empty, provide reasonable default so UI still looks good
        $activeAthletes = max(500, \App\Models\SportsRegistration::count());
        $expertCoaches  = 25; // adjust if coach model added
        $programsCount  = max(12, count($sports));

        $data = [
            'projectName' => __('messages.app_name'),
            'sports' => $sports,
            'about' => __('messages.about_text'),
            'mission' => __('messages.mission_text'),
            'unifyMission' => __('messages.unify_mission'),
            'vision' => __('messages.vision_text'),
            'visionPoints' => [
                __('messages.vision_point_1'),
                __('messages.vision_point_2'),
                __('messages.vision_point_3'),
                __('messages.vision_point_4'),
                __('messages.vision_point_5'),
            ],
            'objectives' => [
                __('messages.objective_1'),
                __('messages.objective_2'),
                __('messages.objective_3'),
                __('messages.objective_4'),
                __('messages.objective_5'),
            ],
            'address' => 'P.O Box 50472, Great Road Lilayi 10, LUSAKA ZAMBIA',
            'phone' => '+18174497227',
            'email' => 'nkes.academy@nkes-sports.org',
            'tagline' => __('messages.tagline'),
            'subtagline' => __('messages.subtagline'),
            'activeAthletes' => $activeAthletes,
            'expertCoaches' => $expertCoaches,
            'programsCount' => $programsCount,
            'teamMembers' => [
                [
                    'name' => __('messages.team_1_name'),
                    'role' => __('messages.team_1_role'),
                    'image' => 'images/ceo.png',
                    'bio' => __('messages.team_1_bio'),
                ],
                [
                    'name' => __('messages.team_2_name'),
                    'role' => __('messages.team_2_role'),
                    'image' => 'images/exec_director.png',
                    'bio' => __('messages.team_2_bio'),
                ],
                [
                    'name' => __('messages.team_3_name'),
                    'role' => __('messages.team_3_role'),
                    'image' => 'images/non_exec_director.png',
                    'bio' => __('messages.team_3_bio'),
                ],
                [
                    'name' => __('messages.team_4_name'),
                    'role' => __('messages.team_4_role'),
                    'image' => 'images/General Manager.png',
                    'bio' => __('messages.team_4_bio'),
                ],
                [
                    'name' => __('messages.team_5_name'),
                    'role' => __('messages.team_5_role'),
                    'image' => 'images/General Advisor.png',
                    'bio' => __('messages.team_5_bio'),
                ],
                [
                    'name' => __('messages.team_6_name'),
                    'role' => __('messages.team_6_role'),
                    'image' => 'images/Coordinator ...Gamer planner and coaches representative.png',
                    'bio' => __('messages.team_6_bio'),
                ],
                [
                    'name' => __('messages.team_7_name'),
                    'role' => __('messages.team_7_role'),
                    'image' => 'images/Financial manager.jpg',
                    'bio' => __('messages.team_7_bio'),
                ],
            ]
        ];

        return view('home', $data);
    }

    public function shop()
    {
        $jerseys = [
            'school' => [
                ['name' => 'Blue Jersey', 'image' => 'images/school_jesery/blue.png'],
                ['name' => 'Red Jersey', 'image' => 'images/school_jesery/red.png'],
                ['name' => 'Green Jersey', 'image' => 'images/school_jesery/green.png'],
                ['name' => 'Yellow Jersey', 'image' => 'images/school_jesery/yellow.png'],
                ['name' => 'Pink Jersey', 'image' => 'images/school_jesery/pink.png'],
                ['name' => 'Purple Jersey', 'image' => 'images/school_jesery/purple.png'],
                ['name' => 'Orange Jersey', 'image' => 'images/school_jesery/orange.png'],
                ['name' => 'Grey Jersey', 'image' => 'images/school_jesery/grey.png'],
            ],
            'province' => [
                ['name' => 'Blue Jersey', 'image' => 'images/province_jesery/blue.png'],
                ['name' => 'Green Jersey', 'image' => 'images/province_jesery/green.png'],
                ['name' => 'Orange Jersey', 'image' => 'images/province_jesery/orange.png'],
                ['name' => 'Purple Jersey', 'image' => 'images/province_jesery/purple.png'],
                ['name' => 'Red Jersey', 'image' => 'images/province_jesery/red.png'],
            ],
            'international' => [
                ['name' => 'Soccer Jersey', 'image' => 'images/international_jesery/soccer.png'],
                ['name' => 'Basketball Jersey', 'image' => 'images/international_jesery/basketball.png'],
                ['name' => 'Rugby Jersey', 'image' => 'images/international_jesery/rugby.png'],
                ['name' => 'Athletics Jersey', 'image' => 'images/international_jesery/atheletics.png'],
            ],
            'other' => [
                ['name' => 'Baseball Jersey 1', 'image' => 'images/other/baseball1.png'],
                ['name' => 'Baseball Jersey 2', 'image' => 'images/other/baseball2.png'],
            ],
        ];

        return view('shop', compact('jerseys'));
    }
}
