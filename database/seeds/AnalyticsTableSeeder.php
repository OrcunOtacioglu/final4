<?php

use Illuminate\Database\Seeder;

class AnalyticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawAnalytics = [
            'general_info' => [
                'total_ticket_count' => 447,
                'total_sold_ticket_count' => 45,
                'total_remaining_ticket_count' => 402,
                'category_breakdown' => [
                    [
                        'id' => null,
                        'color_code' => '57C7D4',
                        'name' => 'Platinum Hospitality',
                        'starting' => 6,
                        'sold' => 0,
                        'remaining' => 6,
                        'total_available' => 6
                    ],
                    [
                        'id' => null,
                        'color_code' => 'e7983b',
                        'name' => 'Gold Hospitality',
                        'starting' => 22,
                        'sold' => 6,
                        'remaining' => 16,
                        'total_available' => 16
                    ],
                    [
                        'id' => 2,
                        'color_code' => 'f04f51',
                        'name' => 'Central Lower Bowl',
                        'starting' => 300,
                        'sold' => 28,
                        'remaining' => 272,
                        'total_available' => 272
                    ],
                    [
                        'id' => 3,
                        'color_code' => '57C7D4',
                        'name' => 'Central Upper Bowl',
                        'starting' => 20,
                        'sold' => 0,
                        'remaining' => 20,
                        'total_available' => 20
                    ],
                    [
                        'id' => 4,
                        'color_code' => 'af5ac1',
                        'name' => 'Baseline Lower Bowl',
                        'starting' => 19,
                        'sold' => 14,
                        'remaining' => 5,
                        'total_available' => 5
                    ],
                    [
                        'id' => 5,
                        'color_code' => 'e7983b',
                        'name' => 'Baseline Upper Bowl',
                        'starting' => 80,
                        'sold' => 0,
                        'remaining' => 80,
                        'total_available' => 0
                    ],
                ],
                'extra_breakdown' => [
                    'hotels' => [
                        'general_info' => [
                            'starting' => 105,
                            'sold' => 29,
                            'remaining' => 76,
                            'total_available' => 76
                        ],
                        'hotels_breakdown' => [
                            [
                                'id' => 4,
                                'reference' => 'z7m662',
                                'name' => 'Hotel Prag',
                                'total' => 25,
                                'sold' => 6,
                                'remaining' => 19,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 0
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 6
                                    ]
                                ]
                            ],
                            [
                                'id' => 3,
                                'reference' => 'WoSpIB',
                                'name' => 'Radisson Blu Old Mill Belgrade',
                                'total' => 20,
                                'sold' => 1,
                                'remaining' => 20,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 0
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 1
                                    ]
                                ]
                            ],
                            [
                                'id' => 6,
                                'reference' => 'Hzys0L',
                                'name' => 'Life Design Hotel',
                                'total' => 10,
                                'sold' => 0,
                                'remaining' => 10,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 0
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 0
                                    ]
                                ]
                            ],
                            [
                                'id' => 2,
                                'reference' => '0AfFhL',
                                'name' => 'Crowne Plaza Belgrade',
                                'total' => 25,
                                'sold' => 22,
                                'remaining' => 3,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 1
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 21
                                    ]
                                ]
                            ],
                            [
                                'id' => 1,
                                'reference' => 'F3jWgn',
                                'name' => 'Falkensteiner Hotel Belgrade',
                                'total' => 20,
                                'sold' => 6,
                                'remaining' => 14,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 6
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 0
                                    ]
                                ]
                            ],
                            [
                                'id' => 5,
                                'reference' => 'JzGpgU',
                                'name' => 'Holiday Inn Belgrade',
                                'total' => 5,
                                'sold' => 2,
                                'remaining' => 3,
                                'room_types' => [
                                    [
                                        'reference' => '',
                                        'name' => 'Single Use',
                                        'sold' => 0
                                    ],
                                    [
                                        'reference' => '',
                                        'name' => 'Double Use',
                                        'sold' => 2
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ],
            'financial_info' => [
                'gross_sales' => 54461.81,
                'offline_sales' => 41395,
                'online_sales' => 13066.81,
                'total_cost' => 36562,
                'net_income' => 17899.81
            ]
        ];

        $analytics = json_encode($rawAnalytics, true);

        DB::table('analytics')->insert([
            'id' => 1,
            'event_name' => 'Turkish Airlines Euroleague Final Four 2018 Belgrade',
            'analytics' => $analytics,
        ]);
    }
}
