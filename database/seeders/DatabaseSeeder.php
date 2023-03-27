<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fatima',
            'email' => 'fatimar@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '082178831257',
            'role' => 'admin'
        ]);

        User::factory(5)->create();


        $data = [
            'comedy', 'horror', 'thriller', 'romance', 'bioghraphy', 'comic', 'fantasy', 'mystery', 'textbook'
        ];

        foreach($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }

        Book::create([
            'title' => 'The Chronicles of Audy 4R',
            'code' => 'N01',
            'author' => 'Orizuka',
            'publisher' => 'Haru',
            'synopsis' => 'Hai. Namaku Audy. Umurku 22 tahun. Hidupku tadinya biasa-biasa saja, sampai kedua orangtuaku jatuh bangkrut karena ditipu. Aku hanya tinggal selangkah lagi menuju gelar sarjanaku. Selangkah lagi! Tapi kedua orangtuaku rupanya tega merusak momen itu. Jadi sekarang, di sinilah aku berada. Di rumah aneh yang dihuni oleh 4 bersaudara yang sama anehnya: Regan, Romeo, Rex dan Rafael. Aku, yang awalnya berpikir akan bekerja sebagai babysitter, dijebak oleh kontrak sepihak dan malah dijadikan pembantu! Terdengar klise? Mungkin, bagimu. Bagiku? Musibah! Ini, adalah kronik dari kehidupanku yang mendadak jadi ribet. Kronik dari seorang Audy.',
            'stock' => '4'
        ]);

        
        Book::create([
            'title' => 'The Chronicles of Audy 21',
            'code' => 'N02',
            'author' => 'Orizuka',
            'publisher' => 'Haru',
            'synopsis' => 'Hai. Namaku Audy. Umurku masih 22 tahun. Hidupku tadinya biasa-biasa saja, sampai aku memutuskan untuk bekerja di rumah 4R.Aku sempat berhenti, tapi mereka berhasil membujukku untuk kembali setelah memberiku titel baru: "bagian dari keluarga". Di saat aku merasa semakin akrab dengan mereka, pada suatu siang, salah seorang dari mereka mengungkapkan perasaannya kepadaku.Aku tidak tahu harus bagaimana! Lalu, seolah itu belum cukup mengagetkan, terjadi sesuatu yang tidak pernah terpikirkan siapa pun. Ini, adalah kronik dari kehidupanku yang semakin ribet. Kronik dari seorang Audy.',
            'stock' => '4'
        ]);
        

        Book::create([
            'title' => 'The Chronicles of Audy : 4/4',
            'code' => 'N03',
            'author' => 'Orizuka',
            'publisher' => 'Haru',
            'synopsis' => 'Hai. Namaku Audy. Umurku masih 22 tahun. Hidupku tadinya biasa-biasa saja, sampai aku memutuskan untuk bekerja di rumah 4R dan jatuh hati pada salah seorang di antaranya. Kuakui aku bertingkah (super) norak soal ini, tapi kenapa dia malah kelihatan santai-santai saja? Setengah mati aku berusaha jadi layak untuknya, tapi dia bahkan tidak peduli! Di saat aku sedang dipusingkan oleh masalah percintaan ini, seperti biasa, muncul masalah lainnya. Tahu-tahu saja, keluarga ini berada di ambang perpisahan! Aku tidak ingin mereka tercerai-berai, tapi aku bisa apa? Ini, adalah kronik dari kehidupanku yang masih saja ribet. Kronik dari seorang Audy.',
            'stock' => '4'
        ]);
        

        Book::create([
            'title' => 'The Chronicles of Audy : O2',
            'code' => 'N04',
            'author' => 'Orizuka',
            'publisher' => 'Haru',
            'synopsis' => 'Hai. Namaku Audy. Umurku masih 22 tahun. Hidupku tadinya biasa-biasa saja, sampai cowok yang kusukai memutuskan untuk meneruskan sekolah ke luar negeri. Ketika aku sedang berpikir tentang nasib hubungan kami, dia memintaku menunggu. Namun ternyata, tidak cuma itu. Dia juga memberikan pernyataan yang membuatku ketakutan setengah mati! Di saat aku sedang kena galau tingkat tinggi, masalah baru (lagi-lagi) muncul. Seseorang yang tak pernah kulirik sebelumnya, sekarang meminta perhatianku. Ini, adalah kronik dari kehidupanku yang sepertinya akan selalu ribet. Kronik dari seroang Audy',
            'stock' => '4'
        ]);
        

        Book::create([
            'title' => 'Sherlock Holmes : A Study in Scarlet (Indonesian Edition)',
            'code' => 'NE01',
            'author' => 'Sir Arthur Conan Doyle',
            'publisher' => 'Shira Media',
            'synopsis' => 'A Study in Scarlet merupakan novel fiksi detektif karya Sir Arthur Conan Doyle yang memperkenalkan tokoh detektif konsultan rekaannya, Sherlock Holmes, serta sahabat sekaligus penulis kisah petualangannya, dr.Watson, yang kelak akan menjadi dua tokoh terkenal dalam dunia sastra. Doyle menulis kisah ini pada tahun 1886 dan diterbitkan setahun kemudian.',
            'stock' => '4'
        ]);

        Book::create([
            'title' => 'Sherlock Holmes : The Sign of Four (Indonesian Edition)',
            'code' => 'NE02',
            'author' => 'Sir Arthur Conan Doyle',
            'publisher' => 'Shira Media',
            'synopsis' => 'The Sign of Four adalah novel kedua karya Sir Arthur Conan Doyle yang menampilkan Sherlock Holmes, terbit pertama kali pada tahun 1890 di Lippincott\'s Monthly Magazine.',
            'stock' => '4'
        ]);
        
        Book::create([
            'title' => 'Sherlock Holmes : The Hound of Baskerville (Indonesian Edition)',
            'code' => 'NE03',
            'author' => 'Sir Arthur Conan Doyle',
            'publisher' => 'Shira Media',
            'synopsis' => 'The Hound of Baskerville merupakan cerita penyelidikan Holmes yang dianggap paling misterius sekaligus berbau supranatural. Ceritanya juga berjalan dengan sangat menegangkan, dari awal sampai akhir',
            'stock' => '4'
        ]);

        Book::create([
            'title' => 'Sherlock Holmes : The Valley of Fear (Indonesian Edition)',
            'code' => 'NE04',
            'author' => 'Sir Arthur Conan Doyle',
            'publisher' => 'Shira Media',
            'synopsis' => 'The Valley of Fear adalah novel Sherlock Holmes keempat dan terkahir karya Sir Arthur Conan Doyle. Novel ini didasarkan pada eksploitasi kehidupan nyata dari Molly Maguires dan agen Pinkerton James McParland. Cerita ini pertama kali diterbitkan di "Strand Magazine" antara September 1914 hingga Mei 1915',
            'stock' => '4'
        ]);
        
    }
}
