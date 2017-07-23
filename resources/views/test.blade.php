@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content herocreatorpage">

        <div class="row">
            <div class="small-16 columns">
                <h1>Hero Creation</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
		
		    <script>
                (function(window, $) {
                    'use strict';
                    window.BFH = window.BFH || {};
                    window.BFH.barbershopSettings = {
                        '_csrf_token': '{{ csrf_field() }}',
                        'nameRequired': true,
                        'barbershop': false,
                        'name_url': 'http://www.reviveheroes.com/en/hero/checkHeroNameAvailability',
                        'price': 0,
                        'help': {
                            'default': ['Welcome to Heroes Awaken',
                                'I&#039;m a %heroClass% for the %faction%. If you want to, you can change my role on the battlefield and team loyalties to the right.'
                            ],
                            'baseMSGPersonaClassStats': {
                                0: ['Commando',
                                    'Sneaks up on his prey to unload decisive attacks.'
                                ],
                                1: ['Soldier',
                                    'Takes control of the battle to help his compatriots reach their goals.'
                                ],
                                2: ['Gunner',
                                    'Takes a beating and keeps on ticking.'
                                ]
                            },
                            'baseMSGFactionStats': {
                                1: ['National army',
                                    'Suave, Stylish, and ready to fight for the Red and Black.'
                                ],
                                2: ['Royal army',
                                    'Dashing, Dapper and ready to fight for the Yellow and Blue.'
                                ]
                            }
                        }
                    };
                })(window, jQuery);

            </script>

            <form id="createHero"  method="post"><!-- action=" route('profile.createHero') " -->
                {{ csrf_field() }}
                <div class="inner">
                    <table>
                        <tr>
                            <th>
                                <label for="baseMSGFactionStats">BaseMSGFactionStats</label>
                            </th>
                            <td>
                                <select name="baseMSGFactionStats" id="baseMSGFactionStats">
                                    <option value="1">1</option>
                                    <option value="2" selected="selected">2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="baseMSGPersonaClassStats">BaseMSGPersonaClassStats</label>
                            </th>
                            <td>
                                <select name="baseMSGPersonaClassStats" id="baseMSGPersonaClassStats">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2" selected="selected">2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="baseMSGAppearanceSkinToneStats">BaseMSGAppearanceSkinToneStats</label>
                            </th>
                            <td>
                                <select name="baseMSGAppearanceSkinToneStats" id="baseMSGAppearanceSkinToneStats">
                                    <option value="1">1</option>
                                    <option value="2" selected="selected">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="haircolor_ui_name">Haircolor ui name</label>
                            </th>
                            <td>
                                <select name="haircolor_ui_name" id="haircolor_ui_name">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3" selected="selected">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="baseMSGAppearanceHairStyleStats">BaseMSGAppearanceHairStyleStats</label>
                            </th>
                            <td>
                                <select name="baseMSGAppearanceHairStyleStats" id="baseMSGAppearanceHairStyleStats">
                                    <optgroup label="0"></optgroup>
                                    <optgroup label="1">
                                        <option value="0">0</option>
                                        <option value="120">120</option>
                                        <option value="121">121</option>
                                        <option value="122">122</option>
                                        <option value="123">123</option>
                                        <option value="124">124</option>
                                        <option value="125">125</option>
                                    </optgroup>
                                    <optgroup label="2">
                                        <option value="0">0</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86" selected="selected">86</option>
                                        <option value="87">87</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="facial_ui_name">Facial ui name</label>
                            </th>
                            <td>
                                <select name="facial_ui_name" id="facial_ui_name">
                                    <optgroup label="0"></optgroup>
                                    <optgroup label="1">
                                        <option value="0">0</option>
                                        <option value="126">126</option>
                                        <option value="127">127</option>
                                        <option value="128">128</option>
                                        <option value="129">129</option>
                                        <option value="130">130</option>
                                        <option value="131">131</option>
                                        <option value="132">132</option>
                                        <option value="133">133</option>
                                    </optgroup>
                                    <optgroup label="2">
                                        <option value="0">0</option>
                                        <option value="102">102</option>
                                        <option value="103">103</option>
                                        <option value="104">104</option>
                                        <option value="105">105</option>
                                        <option value="106">106</option>
                                        <option value="107">107</option>
                                        <option value="108" selected="selected">108</option>
                                        <option value="109">109</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="nameCharacterText">NameCharacterText</label>
                            </th>
                            <td>
                                <input type="text" name="nameCharacterText" id="nameCharacterText" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="heroId">HeroId</label>
                            </th>
                            <td>
                                <input type="text" name="heroId" id="heroId" />
                                <input type="hidden" name="_csrf_token" value="27abda305fa9ac541bc8c5a65cea575f" id="csrf_token" />
                            </td>
                        </tr>
                    </table>
                    <div class="preview">
                        <div class="face"><span class="icon_skin"></span><span class="icon_facialHair"></span><span class="icon_hair"></span><span class="facialFeatures"></span></div>
                        <div class="doll"></div>
                        <div class="help">
                            <span class="header">Welcome to Battlefield Heroes</span>
                            <span class="bodyText">I'm a %heroClass% for the %faction%. If you want to, you can change my role on the battlefield and team loyalties to the right.</span>
                        </div>
                    </div>
                    <div class="heroType">
                        <ul class="faction" data-type="baseMSGFactionStats"></ul>
                        <ul class="heroClass" data-type="baseMSGPersonaClassStats"></ul>
                    </div>
                    <div class="characteristics">
                        <ul class="hairSelector baseMSGAppearanceHairStyleStats">
                            <li class="hair">
                                <h2 data-tab="baseMSGAppearanceHairStyleStats"></h2>
                                <ul data-type="baseMSGAppearanceHairStyleStats" class="faction1"></ul>
                                <ul data-type="baseMSGAppearanceHairStyleStats" class="faction2"></ul>
                            </li>
                            <li class="facialHair">
                                <h2 data-tab="facial_ui_name"></h2>
                                <ul data-type="facial_ui_name" class="faction1"></ul>
                                <ul data-type="facial_ui_name" class="faction2"></ul>
                            </li>
                        </ul>
                        <div class="colorSelector">
                            <h2>skin tone</h2>
                            <ul class="skinColor" data-type="baseMSGAppearanceSkinToneStats"></ul>
                            <h2>hair color</h2>
                            <ul class="hairColor" data-type="haircolor_ui_name"></ul>
                        </div>
                    </div>
                    <div class="actions">
                        <span id="randomHero">surprise me<span class="decoration"></span></span>
                        <span id="saveHero">i'm done<span class="decoration"></span></span>
                    </div>
                    <div class="overlay">
                        <div class="nameSelector">
                            <span class="header">Give me a name!</span>
                            <input class="heroName" type="text" name="heroName" maxlength="16" />
                            <span id="cancelName">back<span class="decoration"></span></span>
                            <input id="chooseName" type="submit" value="Create"><span class="decoration"></span>
                        </div>
                        {{--<div class="error">This name is yours soldier! But first we must move this fancy page to the HeroesAwaken.com</div>--}}
                    </div>
                </div>
            </form>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            document.getElementById("randomHero").click()
        }, false);

    </script>

@endsection