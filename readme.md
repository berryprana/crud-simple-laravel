![Intro](https://github.com/berryprana/crud-simple-laravel/blob/master/public/index.png)

# Simple CRUD
> Memulai dari awal untuk membuat crud yang sangat sederhana

## Setup
Framework Laravel mempunyai beberapa persyaratan sistem
untuk melihat lebih lengkap kunjungi [laravel docs](https://laravel.com/docs/7.x)

* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Lets Start
1. Silahkan teman-teman jalankan perintah dibawah ini untuk menginstall Framework Laravel.
- `composer create-project —-prefer-dist laravel/laravel namaproject`
2. Buat database baru dan ganti nama database di .env
- `DB_DATABASE=namadatabase`
3. Buat table sebagai contoh kita membuat table dengan nama Siswa.
- `php artisan make:model Siswa -cm` //perintah tersebut digunakan untuk membuat model sekaligus controller dan migration.

- Model adalah sebagai penghubung antara Controller dengan database yang berguna untuk mengambil data.
- Controller, dapat diartikan sebagai kendali atau pengendali diambil dari kata controll bisa juga diartikan jembatan antara view dan model. 
- Migration adalah Control Version System untuk database yang berfungsi untuk mengelola database dengan lebih mudah.

4. Isi field table di file migration yang terletak di /database/migrations
- isi di bagian public function up() dibawah `id` dengan 
```$table->string('nama_depan');
$table->string('nama_belakang');
$table->string('jenis_kelamin');
$table->integer('umur');
$table->string('alamat');
```
    
5. Isi di dalam class modelnya yang berada di folder App dengan nama file Siswa.php
  - `protected $table = (‘namatable’);`
    
6. Buat file baru di folder views dengan nama file index.blade.php // isi terlebih dahulu `<h1> Ini views index </h1>`agar nanti mudah untuk mengecek apakah sudah terhubung dengan controller atau belum.

7. Isi routes yang terletak di routes/web.php untuk melihat views index diatas, 
-`Route::get (‘/siswa’, ‘SiswaController@index’);`

8. Isi controller yang telah dibuat, terletak di App/Http/Controllers 
```public function index() //Function untuk view semua data
    {
        $data_siswa = \App\Siswa::all();
        return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(request $request) //Function untuk create data
    {
        \App\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data Berhasil Diinput!');
    }

    public function edit($id) //Function untuk mencari id data yang ingin di edit
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(request $request,$id) //Function untuk update data
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses','Data Berhasil Diupdate!');
    }

    public function delete($id) //Function untuk delete data
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }(‘index’,[‘data_siswa’ => $data_siswa]);
    }
 ```  
  - jangan lupa menambahkan use diatas codesheet untuk menghubungkan dengan model = `use App/Siswa`
  
 9. Untuk melihat file views index.blade.php yang telah dibuat tadi, buka browser anda jalankan localhost:8000/siswa dan jangan lupa untuk menjalankan perintah di cmd / terminal `php artisan serve`
  

   


