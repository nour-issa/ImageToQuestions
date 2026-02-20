<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Image2QuestionController extends Controller
{
    public function generateQuestions(Request $request){
        try{
            $request->validate([
            'image' => 'required|image|mimes:jfif,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $request->image->move(public_path('') . '/../kedro-introduction-tutorial-master/data/09_swin/', 'input_image.jpg');
        shell_exec("..\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline swin-detection");
        $questions = json_decode(file_get_contents(public_path() . '/../kedro-introduction-tutorial-master/data/13_questions/word_net.json'), true);
        $keywords =  json_decode(file_get_contents(public_path() . '/../kedro-introduction-tutorial-master/data/13_questions/keywords.json'), true);
        $questions2 = json_decode(file_get_contents(public_path() . '/../kedro-introduction-tutorial-master/data/13_questions/jaccard_similarity.json'), true);
        // $keywords =  json_decode(file_get_contents(public_path() . '/../kedro-introduction-tutorial-master/data/13_questions/keywords.json'), true);
        
        return response()->json([
                    'response'   => 'yeaaaaaaaaah!!!!',
                    'questions' => $questions,
                    'keywords' => $keywords,
                    'questions2'=> $questions2
                    ]);

        
                }
        catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
