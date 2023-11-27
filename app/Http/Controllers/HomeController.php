<?php

namespace App\Http\Controllers;

use App\Course;
use App\Planet;
use App\PlanetContent;
use App\SubPlanet;
use App\SubPlanetContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function planets(Course $course)
    {
        return view('planets', [
            'course' => $course
        ]);
    }

    public function descriptions(Planet $planet)
    {
        return view('descriptions', [
            'planet' => $planet,
            'slides' => $planet->planet_contents()->paginate(1)
        ]);
    }

    public function subplanets(Planet $planet)
    {
        return view('sub-planets', [
            'planet' => $planet
        ]);
    }

    public function subdescriptions(SubPlanet $subPlanet)
    {
        return view('subdescriptions', [
            'subPlanet' => $subPlanet,
            'slides' => $subPlanet->sub_planet_contents()->paginate(1)
        ]);
    }

    public function content_add(Request $request, Planet $planet, $edit = false)
    {
        $type = 0;

        if ($edit) {
            $content = PlanetContent::find($edit);
            if ($content->name == "Quiz" && $content->qtype == 'quiz') {
                $type = 1;
            } else if ($content->name == "Quiz" && $content->blankstype == 'printsln') {
                $type = 2;
            } else if ($content->name == "take") {
                $type = 3;
            }
        } else {
            if ($request->has('mcq')) {
                $type = 1;
            } else if ($request->has('fillblank')) {
                $type = 2;
            } else if ($request->has('takeaway')) {
                $type = 3;
            }
        }

        return view('content.edit', [
            'planet' => $planet,
            'edit' => $edit,
            'content' => $edit ? PlanetContent::find($edit) : null,
            'type' => $type
        ]);
    }

    public function content_add_save(Request $request, Planet $planet)
    {
        if ($request->type == 1) {
            //mcq save
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'question' => 'required',
                'solution' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'solution' => $request->solution,
                'question' => $request->question,
                'code' => $request->code,
                'option' => $request->option
            ];

            $content = new PlanetContent();
            $content->name = 'Quiz';
            $content->qtype = 'quiz';
            $content->planet_id = $request->planet_id;
            $content->quiz = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            }

            return back();
        } else if ($request->type == 2) {
            //fill blank save
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'des_01' => 'required',
                'soln' => 'required',
                'hint' => 'required',
                'explain' => 'required',
                'tbefore' => 'required'
            ]);

            //generate json for fill blank
            $quizData = [
                'soln' => $request->soln,
                'tf1' => $request->tbefore
            ];

            $content = new PlanetContent();
            $content->name = 'Quiz';
            $content->bookmark = 'hints|' . $request->hint . '|' . $request->explain . '|' . $request->soln;
            $content->planet_id = $request->planet_id;
            $content->des_01 = $request->des_01;
            $content->blankstype = 'printsln';
            $content->blanks = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            }

            return back();
        } else if ($request->type == 3) {
            //takeaway slide
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'des_01' => 'required'
            ]);

            if (PlanetContent::create($request->only('name', 'planet_id', 'des_01'))) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            } else {
                return back();
            }
        }

        //else slide

        $request->validate([
            'name' => 'required',
            'planet_id' => 'required'
        ]);

        if (PlanetContent::create($request->except(['_token', 'type']))) {
            return redirect()->route('home.planets.contentAdd', $planet->id);
        } else {
            return back();
        }
    }

    public function content_update(Request $request, Planet $planet)
    {

        if ($request->type == 1) {
            //mcq save
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'question' => 'required',
                'solution' => 'required',
                'id' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'solution' => $request->solution,
                'question' => $request->question,
                'code' => $request->code,
                'option' => $request->option
            ];

            $content = PlanetContent::find($request->id);
            $content->planet_id = $request->planet_id;
            $content->quiz = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            }

            return back();
        } else if ($request->type == 2) {
            //fill blank save
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'des_01' => 'required',
                'soln' => 'required',
                'hint' => 'required',
                'explain' => 'required',
                'tbefore' => 'required',
                'id' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'soln' => $request->soln,
                'tf1' => $request->tbefore
            ];

            $content = PlanetContent::find($request->id);
            $content->bookmark = 'hints|' . $request->hint . '|' . $request->explain . '|' . $request->soln;
            $content->planet_id = $request->planet_id;
            $content->des_01 = $request->des_01;
            $content->blanks = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            }

            return back();
        } else if ($request->type == 3) {
            //takeaway slide
            $request->validate([
                'name' => 'required',
                'planet_id' => 'required',
                'des_01' => 'required',
                'id' => 'required'
            ]);

            $content = PlanetContent::find($request->id);
            $content->fill($request->only('name', 'planet_id', 'des_01'));
            if ($content->save()) {
                return redirect()->route('home.planets.contentAdd', $planet->id);
            }

            return back();
        }

        //else slide
        $request->validate([
            'name' => 'required',
            'planet_id' => 'required',
            'id' => 'required'
        ]);

        $content = PlanetContent::find($request->id);
        $content->fill($request->except(['_token', 'type']));

        if ($content->save()) {
            return redirect()->route('home.planets.contentAdd', $planet->id);
        }

        return back();
    }

    public function content_delete(PlanetContent $planetContent)
    {
        $planet = $planetContent->planet;
        $planetContent->delete();
        return redirect()->route('home.planets.contentAdd', $planet->id);
    }

    /**
     * @param Request $request
     * @param SubPlanet $subPlanet
     * @param bool $edit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Sub planet content controller
     */

    public function sub_content_add(Request $request, SubPlanet $subPlanet, $edit = false)
    {
        $type = 0;

        if ($edit) {
            $subPlanetContent = SubPlanetContent::find($edit);
            if ($subPlanetContent->name == "Quiz" && $subPlanetContent->qtype == 'quiz') {
                $type = 1;
            } else if ($subPlanetContent->name == "Quiz" && $subPlanetContent->blankstype == 'printsln') {
                $type = 2;
            } else if ($subPlanetContent->name == "take") {
                $type = 3;
            }
        } else {
            if ($request->has('mcq')) {
                $type = 1;
            } else if ($request->has('fillblank')) {
                $type = 2;
            } else if ($request->has('takeaway')) {
                $type = 3;
            }
        }

        return view('content.subcontent.edit-sub-planet', [
            'subPlanet' => $subPlanet,
            'edit' => $edit,
            'content' => $edit ? SubPlanetContent::find($edit) : null,
            'type' => $type
        ]);
    }

    public function sub_content_add_save(Request $request, SubPlanet $subPlanet)
    {
        if ($request->type == 1) {
            //mcq save
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'question' => 'required',
                'solution' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'solution' => $request->solution,
                'question' => $request->question,
                'code' => $request->code,
                'option' => $request->option
            ];

            $content = new SubPlanetContent();
            $content->name = 'Quiz';
            $content->qtype = 'quiz';
            $content->des_01 = $request->des_01;
            $content->sub_planet_id = $request->sub_planet_id;
            $content->quiz = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            }

            return back();
        } else if ($request->type == 2) {
            //fill blank save
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'des_01' => 'required',
                'soln' => 'required',
                'hint' => 'required',
                'explain' => 'required',
                'tbefore' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'soln' => $request->soln,
                'tf1' => $request->tbefore
            ];

            $content = new SubPlanetContent();
            $content->name = 'Quiz';
            $content->bookmark = 'hints|' . $request->hint . '|' . $request->explain . '|' . $request->soln;
            $content->sub_planet_id = $request->sub_planet_id;
            $content->des_01 = $request->des_01;
            $content->blankstype = 'printsln';
            $content->blanks = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            }

            return back();
        } else if ($request->type == 3) {
            //takeaway slide
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'des_01' => 'required'
            ]);

            if (SubPlanetContent::create($request->only('name', 'sub_planet_id', 'des_01'))) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            } else {
                return back();
            }
        }

        //else slide

        $request->validate([
            'name' => 'required',
            'sub_planet_id' => 'required'
        ]);

        if (SubPlanetContent::create($request->except(['_token', 'type']))) {
            return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
        } else {
            return back();
        }
    }

    public function sub_content_update(Request $request, SubPlanet $subPlanet)
    {
        if ($request->type == 1) {
            //mcq save
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'question' => 'required',
                'solution' => 'required',
                'id' => 'required'
            ]);

            //generate json for quiz
            $quizData = [
                'solution' => $request->solution,
                'question' => $request->question,
                'code' => $request->code,
                'option' => $request->option
            ];

            $content = SubPlanetContent::find($request->id);
            $content->des_01 = $request->des_01;
            $content->sub_planet_id = $request->sub_planet_id;
            $content->quiz = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            }

            return back();
        } else if ($request->type == 2) {
            //fill blank save
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'des_01' => 'required',
                'soln' => 'required',
                'hint' => 'required',
                'explain' => 'required',
                'id' => 'required',
                'tbefore' => 'required'
            ]);

            //generate json for quiz

            $quizData = [
                'soln' => $request->soln,
                'tf1' => $request->tbefore
            ];

            $content = SubPlanetContent::find($request->id);
            $content->bookmark = 'hints|' . $request->hint . '|' . $request->explain . '|' . $request->soln;
            $content->sub_planet_id = $request->sub_planet_id;
            $content->des_01 = $request->des_01;
            $content->blanks = json_encode($quizData);

            if ($content->save()) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            }

            return back();
        } else if ($request->type == 3) {
            //takeaway slide
            $request->validate([
                'name' => 'required',
                'sub_planet_id' => 'required',
                'des_01' => 'required',
                'id' => 'required'
            ]);

            $content = SubPlanetContent::find($request->id);
            $content->fill($request->only('name', 'sub_planet_id', 'des_01'));

            if ($content->save()) {
                return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
            } else {
                return back();
            }
        }

        //else slide

        $request->validate([
            'name' => 'required',
            'sub_planet_id' => 'required',
            'id' => 'required'
        ]);

        $content = SubPlanetContent::find($request->id);
        $content->fill($request->except(['_token', 'type']));

        if ($content->save()) {
            return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
        } else {
            return back();
        }
    }

    public function sub_content_delete(SubPlanetContent $subPlanetContent)
    {
        $subPlanet = $subPlanetContent->sub_planet;
        $subPlanetContent->delete();
        return redirect()->route('home.planets.subContentAdd', $subPlanet->id);
    }

    public function export(Course $course)
    {
        $homes = [];
        $courseID = $course->course_id;
        $PID = 0;

        foreach ($course->planets as $planet) {
            $more = $planet->type != 'Single';

            $planets = [];

            $planets['id'] = intval($courseID . '' . ++$PID);
            $planets['index'] = $PID;
            $planets['content'] = $course->content_name;
            $planets['title'] = $planet->title;
            $planets['type'] = $planet->type;
            $planets['count'] = $more ? 0 : $planet->planet_contents->count();
            $planets['sync'] = false;
            $planets['result'] = 0;
            $planets['status'] = $PID == 1 ? 'open' : 'lock';

            if ($more) {
                $ssid = 0;
                $slist = [];

                $total = 0;

                $finishC = 0;
                $totalC = $planet->sub_planets->count();

                foreach ($planet->sub_planets as $subList) {
                    $sbs = [];
                    $finishC++;
                    $sbs['id'] = intval($courseID . '' . $PID . '' . ++$ssid);
                    $sbs['mtitle'] = $subList->mtitle;
                    $sbs['mcount'] = $totalC;
                    $sbs['fmodule'] = $finishC == $totalC ? 'true' : 'false';
                    $sbs['result'] = 0;
                    $sbs['status'] = $finishC == 1 ? 'open' : 'lock';

                    $CID = 1;

                    $mds = [];

                    $subTotal = 0;

                    $finishP = 0;
                    $totalP = $subList->sub_planet_contents->count();

                    foreach ($subList->sub_planet_contents as $content) {
                        $des = [];
                        $finishP++;
                        if ($content->name != 'Quiz' && $content->name != 'take') {
                            $des['mid'] = $courseID . '' . $PID . '' . $CID++;
                            $des['bookmark'] = 'false';
                            $subTotal += 50;
                        }

                        if ($content->name == 'take') {
                            $des['bookmark'] = 'false';
                        }

                        if ($content->name == 'Quiz' && $content->qtype == 'quiz') {
                            $subTotal += 100;
                            $quz = json_decode($content->quiz);
                            $des['bookmark'] = 'false';
                            $options = (array)$quz->option;
                            $html = new \Html2Text\Html2Text(trim($quz->solution));
                            $des['quiz'] = [
                                'solution' => $html->getText(),
                                'question' => $quz->question,
                                'code' => $quz->code ?? 'null',
                                'option' => [
                                    [
                                        'set' => trim($options[1])
                                    ],
                                    [
                                        'set' => trim($options[2])
                                    ],
                                    [
                                        'set' => trim($options[3])
                                    ]
                                ],
                            ];
                        }

                        if ($content->name == 'Quiz' && $content->blankstype == 'printsln') {
                            $subTotal += 100;
                            $des['bookmark'] = $content->bookmark ?? 'hint | hint | explain | ans';
                            $blank = json_decode($content->blanks);

                            // get only last line
                            $text = $blank->tf1;
                            $start = substr($text, 0, strpos($text, "[blank]"));
                            $end = str_replace("[blank]", "", substr($text, strpos($text, "[blank]")));

                            $startLines = explode("<br />", $start);
                            $tt1 = end($startLines);

                            if (strlen($tt1) < 1) {
                                $tf1 = implode('<br>', $startLines);
                                $tt1 = 'null';
                            } else {
                                $tt1 = str_replace("<br />", "", $tt1);
                                array_pop($startLines);
                                if (count($startLines)) {
                                    $tf1 = implode('<br>', $startLines);
                                } else {
                                    $tf1 = 'null';
                                }

                            }


                            // get only first line
                            $endLines = explode("<br />", $end);
                            if (count($endLines)) {
                                if (trim($endLines[0]) == '') {
                                    //no line end
                                    $tt2 = 'null';
                                    array_shift($endLines);
                                    $tf2 = implode('<br>', $endLines);
                                } else {
                                    $tt2 = str_replace("<br />", "", $endLines[0]);
                                    array_shift($endLines);
                                    if (count($endLines)) {
                                        $tf2 = implode('<br>', $endLines);
                                    } else {
                                        $tf2 = 'null';
                                    }
                                }
                            } else {
                                $tt2 = "null";
                                $tf2 = "null";
                            }

                            $des['blanks'] = [
                                'v1' => 0,
                                'v2' => 0,
                                'soln' => $blank->soln,
                                'tf1' => $tf1,
                                'tt1' => $tt1,
                                'tt2' => $tt2,
                                'tf2' => $tf2,
                                'output' => 'Correct',
                                'op' => 'null',
                            ];
                        }

                        if ($content->ptxt) {
                            $des['ptxt'] = $content->ptxt;
                        }
                        if ($content->mtxt) {
                            $des['mtxt'] = $content->mtxt;
                        }
                        if ($content->code2) {
                            $des['code2'] = $content->code2;
                        }

                        $des['name'] = $content->name;
                        $des['des_01'] = $content->des_01 ?? 'null';
                        $des['link01'] = $content->link01 ?? 'null';
                        $des['des_02'] = $content->des_02 ?? 'null';
                        $des['link02'] = $content->link02 ?? 'null';
                        $des['code'] = $content->code ?? 'code block';
                        $des['output'] = $content->output ?? 'null';
                        $des['mark'] = 0;
                        $des['status'] = 'false';
                        $des['des_03'] = $content->des_03 ?? 'null';
                        $des['qtype'] = $content->qtype ?? 'normal';
                        $des['blankstype'] = $content->blankstype ?? 'null';
                        $des['finish'] = $totalP == $finishP ? 'true' : 'false';

                        array_push($mds, $des);
                    }

                    $total += $subTotal;
                    $sbs['total'] = $subTotal;
                    $sbs['mdes'] = $mds;

                    array_push($slist, $sbs);
                }

                $planets['total'] = $total;
                $planets['list'] = $slist;

                //end sub planet content
            } else {
                $CID = 1;
                $planetContent = [];
                $total = 0;

                $finishP = 0;
                $totalP = $planet->planet_contents->count();

                foreach ($planet->planet_contents as $content) {
                    $finishP++;
                    $des = [];
                    if ($content->name != 'Quiz' && $content->name != 'take') {
                        $des['mid'] = $courseID . '' . $PID . '' . $CID++;
                        $des['bookmark'] = 'false';
                        $total += 50;
                    }

                    if ($content->name == 'take') {
                        $des['bookmark'] = 'false';
                    }

                    if ($content->name == 'Quiz' && $content->qtype == 'quiz') {
                        $total += 100;
                        $des['bookmark'] = 'false';
                        $quz = json_decode($content->quiz);
                        $options = (array)$quz->option;
                        
                        $html = new \Html2Text\Html2Text(trim($quz->solution));
                
                        $des['quiz'] = [
                            'solution' => $html->getText(),
                            'question' => $quz->question,
                            'code' => $quz->code ?? 'null',
                            'option' => [
                                [
                                    'set' => trim($options[1])
                                ],
                                [
                                    'set' => trim($options[2])
                                ],
                                [
                                    'set' => trim($options[3])
                                ]
                            ],
                        ];
                    }

                    if ($content->name == 'Quiz' && $content->blankstype == 'printsln') {
                        $des['bookmark'] = $content->bookmark ?? 'hint | hint | explain | ans';
                        $total += 100;
                        $blank = json_decode($content->blanks);

                        // get only last line
                        $text = $blank->tf1;
                        $start = substr($text, 0, strpos($text, "[blank]"));
                        $end = str_replace("[blank]", "", substr($text, strpos($text, "[blank]")));

                        $startLines = explode("<br />", $start);
                        $tt1 = end($startLines);

                        if (strlen($tt1) < 1) {
                            $tf1 = implode('<br>', $startLines);
                            $tt1 = 'null';
                        } else {
                            $tt1 = str_replace("<br />", "", $tt1);
                            array_pop($startLines);
                            if (count($startLines)) {
                                $tf1 = implode('<br>', $startLines);
                            } else {
                                $tf1 = 'null';
                            }

                        }


                        // get only first line
                        $endLines = explode("<br />", $end);
                        if (count($endLines)) {
                            if (trim($endLines[0]) == '') {
                                //no line end
                                $tt2 = 'null';
                                array_shift($endLines);
                                $tf2 = implode('<br>', $endLines);
                            } else {
                                $tt2 = str_replace("<br />", "", $endLines[0]);
                                array_shift($endLines);
                                if (count($endLines)) {
                                    $tf2 = implode('<br>', $endLines);
                                } else {
                                    $tf2 = 'null';
                                }
                            }
                        } else {
                            $tt2 = "null";
                            $tf2 = "null";
                        }

                        $des['blanks'] = [
                            'v1' => 0,
                            'v2' => 0,
                            'soln' => $blank->soln,
                            'tf1' => $tf1,
                            'tt1' => $tt1,
                            'tt2' => $tt2,
                            'tf2' => $tf2,
                            'output' => 'Correct',
                            'op' => 'null',
                        ];
                    }

                    if ($content->mtxt) {
                        $des['mtxt'] = $content->mtxt ?? null;
                    }

                    if ($content->code2) {
                        $des['code2'] = $content->code2 ?? null;
                    }

                    if ($content->ptxt) {
                        $des['ptxt'] = $content->ptxt ?? null;
                    }

                    $des['name'] = $content->name;
                    $des['des_01'] = $content->des_01 ?? 'null';
                    $des['link01'] = $content->link01 ?? 'null';
                    $des['des_02'] = $content->des_02 ?? 'null';
                    $des['link02'] = $content->link02 ?? 'null';
                    $des['code'] = $content->code ?? 'code block';
                    $des['output'] = $content->output ?? 'null';
                    $des['mark'] = 0;
                    $des['status'] = 'false';
                    $des['des_03'] = $content->des_03 ?? 'null';
                    $des['qtype'] = $content->qtype ?? 'normal';
                    $des['blankstype'] = $content->blankstype ?? 'null';
                    $des['finish'] = $totalP == $finishP ? 'true' : 'false';

                    array_push($planetContent, $des);
                }

                $planets['total'] = $total;
                $planets['des'] = $planetContent;
            }

            array_push($homes, $planets);

        }

        return response()->json([[
            'home' => $homes
        ]]);
    }


}