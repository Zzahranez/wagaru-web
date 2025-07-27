<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Berkelakuan Baik</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1,
        h3,
        h5,
        h6 {
            text-align: center;
            margin: 0;
        }

        .row {
            margin-top: 50px;
        }

        .keclogo {
            font-size: 3vw;
        }

        .kablogo {
            font-size: 2vw;
        }

        .alamatlogo {
            font-size: 1.5vw;
        }

        .kodeposlogo {
            font-size: 1.7vw;
        }

        #tls {
            text-align: right;
        }

        .alamat-tujuan {
            text-align: center;
            margin-top: 20px;
        }

        .garis1 {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
            margin-top: 20px;
        }

        #logo {
            display: block;
            margin: auto;
            max-width: 120px;
            height: auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #text-header {
            flex: 1;
            text-align: left;
            padding-left: 20px;
            font-size: 20px;

        }

        #camat {
            text-align: right;
            padding-right: 20px;
        }

        #nama-camat {
            margin-top: 50px;
            text-align: right;
            padding-right: 20px;
        }

        #img {
            margin-right: 20px;
        }

        #logo {
            max-width: 100px;
            height: auto;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            h1,
            h3,
            h5,
            h6 {
                page-break-inside: avoid;
            }

            .row {
                page-break-inside: avoid;
            }
        }

        #rowhider {
            display: flex;
            /* Mengubah layout menjadi flex */
            align-items: center;
            /* Menyelaraskan elemen secara vertikal di tengah */
            justify-content: start;
            /* Mengatur elemen berada di sebelah kiri */

            /* Menambahkan jarak antara gambar dan teks header */
        }

        #gambar img {
            width: 100px;

            /* Atur ukuran gambar sesuai kebutuhan */
        }

        #text-header {
            display: flex;
            flex-direction: column;

            text-align: left;
            /* Agar teks rata kiri */
        }
    </style>
</head>

<body>
    <div>
        <header>
            <div class="row header" id="rowhider">
                <table>
                    {{-- Kolom 1 --}}
                    <td>
                        <div id="gambar">
                            <img src="img/logo_surat.png" alt="Logo">
                        </div>
                    </td>
                    {{-- Kolom 2 --}}
                    <td style="text-align: center; vertical-align: middle;">
                        <div id="text-header">

                            <h4 class="kablogo">PEMERINTAH KABUPATEN MUARO JAMBI</h4>
                            <h4 class="keclogo">KECAMATAN JAMBI LUAR KOTA</h4>
                            <h5 class="alamatlogo">Jl. Lintas Jambi Muaro Bulian NO.0, Rukun Tetangga : 19</h5>
                            <h6 class="kodeposlogo"><strong>Kode Pos : 36361</strong></h6W>
                        </div>
                    </td>
                </table>

            </div>
        </header>

        <div class="container">
            <hr class="garis1" />
            <div id="alamat" class="row">
                <div id="lampiran" class="col-md-6">
                    Nomor : <br />
                    Lampiran : <br />
                    Perihal : Surat Keterangan Tidak Mmapu
                </div>
                <div id="tgl-srt" class="col-md-6">
                    <p id="tls">Mendalo Darat,
                        {{ \Carbon\Carbon::parse($permohonan->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                    </p>

                </div>
            </div>

            <div id="pembuka" class="row">
                <p>&emsp; &emsp; &emsp; Yang bertanda tangan di bawah ini, Ketua RT 19, Mendalo Darat</strong>,
                    Kecamatan <strong>Jambi Luar Kota</strong>, Kabupaten <strong>Muaro Jambi</strong>, dengan ini
                    menerangkan bahwa :</p>
            </div>

            <div id="data-pemohon">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><strong>{{ $permohonan->nama }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><strong> {{ \Carbon\Carbon::parse($permohonan->tanggal_lahir)->format('d F Y') }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><strong>{{ $permohonan->jenis_kelamin }}</strong></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><strong>{{ $permohonan->alamat }}</strong></td>
                    </tr>
                </table>
            </div>

            <div id="penjelasan">
                <p>&emsp; &emsp; &emsp; Berdasarkan data yang ada pada kami dan sepengetahuan kami, orang yang tersebut
                    di atas benar-benar termasuk dalam kategori keluarga kurang mampu secara ekonomi. Surat keterangan
                    ini diberikan untuk keperluan <strong>administratif yang bersangkutan</strong>.
                </p>
            </div>

            <div id="penutup">Demikian surat keterangan ini kami buat dengan sebenarnya, agar dapat dipergunakan
                sebagaimana mestinya.</div>

            <div id="ttd" class="row">
                <div style="width: 100%; text-align: right;">
                    <p id="camat"><strong>Ketua RT 19, </strong></p>
                    <div id="nama-camat">
                        <strong><u>Suharno</u></strong><br />
                    </div>
                </div>
            </div>


        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
