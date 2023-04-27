<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Services\QuerySearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // エロクアント
        // $contacts = ContactForm::all();

        // クエリビルダー
        // $contacts = DB::table('contact_forms')
        //     ->select('id', 'your_name', 'title', 'created_at')
        //     ->orderBy('created_at', 'asc')
        //     ->paginate(20);

        // 検索フォーム(Serviceを使う場合)
        // $query = DB::table('contact_forms');

        // ファットコントローラ
        // // もしキーワードがあったら
        // if ($search !== null) {
        //     // 全角スペースを半角に
        //     $search_split = mb_convert_kana($search, 's');

        //     // 空白で区切る
        //     $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

        //     // 単語をループで回す
        //     foreach ($search_split2 as $value) {
        //         $query->where('your_name', 'like', '%' . $value . '%');
        //     }
        // }

        // $query->select('id', 'your_name', 'title', 'created_at');
        // $query->orderBy('created_at', 'asc');
        // $contacts = $query->paginate(20);

        // ローカルスコープを使う場合
        $query = ContactForm::search($search); // クエリのローカルスコープ
        $contacts = $query->select('id', 'your_name', 'title', 'created_at')->paginate(20);

        // Serviceを使う場合
        // $query = QuerySearchService::searchIndex($query, $search);
        // $contacts = $query->select('id', 'your_name', 'title', 'created_at')->paginate(20);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        // $contact = new ContactForm();
        // $contact->your_name = $request->your_name;
        // $contact->title = $request->title;
        // $contact->email = $request->email;
        // $contact->url = $request->url;
        // $contact->age = $request->age;
        // $contact->gender = $request->gender;
        // $contact->contact = $request->contact;

        // $contact->save();

        $contact = new ContactForm();

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->age = $request->input('age');
        $contact->gender = $request->input('gender');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::findOrFail($id);

        // if ($contact->gender === 0) {
        //     $gender = '男性';
        // } else {
        //     $gender = '女性';
        // }

        // if ($contact->age === 1) {
        //     $age = '〜19歳';
        // }

        // if ($contact->age === 2) {
        //     $age = '20歳〜29歳';
        // }

        // if ($contact->age === 3) {
        //     $age = '30歳〜39歳';
        // }

        // if ($contact->age === 4) {
        //     $age = '40歳〜49歳';
        // }

        // if ($contact->age === 5) {
        //     $age = '50歳〜59歳';
        // }

        // if ($contact->age === 6) {
        //     $age = '60歳〜';
        // }

        $gender = CheckFormService::checkGender($contact);

        $age = CheckFormService::checkAge($contact);

        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $contact = ContactForm::findOrFail($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->age = $request->input('age');
        $contact->gender = $request->input('gender');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::findOrFail($id);

        $contact->delete();

        return redirect()->route('contact.index');
    }
}
