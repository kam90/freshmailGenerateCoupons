<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CodesController extends Controller
{

    const CHARS = 'abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPGRSTUWXYZ1234567890';
    const FILENAME = 'kody.txt';

    private $uniqueCodes = [];

    /**
     * @return mixed
     */
    public function index() {
        $existsFile = Storage::disk('local')->exists(self::FILENAME);
        $file = ($existsFile === true) ? Storage::url(self::FILENAME) : false;
        return view('index')->withFile($file);

    }//end index()


    /**
     * @param CodeValidator $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CodeValidator $request) {
        $this->generateUniqueCodes($request->length, $request->count);
        return redirect('/');

    }//end store()


    /**
     * @param int    $length
     * @param int    $count
     * @param string $fileName
     */
    public function generateUniqueCodes(int $length=10, int $count=10, $fileName=self::FILENAME) {
        $randomString = substr(str_shuffle(self::CHARS), 0, $length);
        if (!in_array($randomString, $this->uniqueCodes)) {
            $this->uniqueCodes[] = $randomString;
        }//end if

        if (count($this->uniqueCodes) != $count) {
            self::generateUniqueCodes($length, $count, $fileName);
        }//end if

        Storage::put($fileName, implode(PHP_EOL, $this->uniqueCodes));
        return;

    }//end generateUniqueCodesArray()

}//end class
