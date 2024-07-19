$(document).ready(function () {
    $('#table_muatan').DataTable();
    $('#tabel_tujuan').DataTable();
    $('#tabel_barang').DataTable();
});

function laporan() {
    let waktu = $('#waktu').val()
    console.log(waktu)
    fetch(`/api/laporan/${waktu}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify()
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(
                    'Gagal menambahkan item ke keranjang.');
            }
            return response.json();
        })
        .then(result => {
            let no = 1;
            let tr = '';
            if (result.length < 1) {
                tr += '';
            } else {
                result.forEach((row) => {
                    tr += `<tr>
                                <td>${no++}</td>
                                <td>${row.dbl}</td>
                                <td>${row.no_kendaraan}</td>
                                <td>${row.supir}</td>
                                <td>
                                    <div class="btn btn-success" onclick="laporan_excel(${row.id})">Download Excel</div>
                                </td>
                
                            </tr>`;
                });
                $('#table_laporan').html(tr)
            }
        })
        .catch(error => {
            // Tangani kesalahan jika ada
            console.error('Gagal menambahkan data:', error);
        });
}

function laporan_excel($id){
    fetch(`/api/laporan_excel/${$id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        let barang = data.barang
        let no = 1;
        

        var modifiedData = [
            ['DAFTAR MUATAN CV.TRANS DEWI RINJANI'],
            ['Truk :'+data.muatan.no_kendaraan,'','','Tgl : '+data.waktu, '','Supir : '+data.muatan.supir, '', 'DBL : '+data.muatan.dbl],
            ['No', 'Resi', 'Pengirim', 'Penerima', 'Jmlh', 'Unit', 'Nama Barang','Ongkos'],
            
        ];
        let total = 0;
        barang.forEach((item) => {
            if(item.status_barang == "-"){
                modifiedData.push([
                    no++,
                    item.no_resi,
                    item.pengirim,
                    item.penerima,
                    item.kuantum,
                    item.unit,
                    item.jenis_barang,
                    item.jumlah_ongkos,
                    ''
                ]);
            }else{
                modifiedData.push([
                    no++,
                    item.no_resi,
                    item.pengirim,
                    item.penerima,
                    item.kuantum,
                    item.unit,
                    item.jenis_barang,
                    item.jumlah_ongkos,
                    item.status_barang
                ]);
            }
            
            total+=item.jumlah_ongkos
        });
        modifiedData.push([
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            total
        ]);

        // Create worksheet from modified data
        var worksheet = XLSX.utils.aoa_to_sheet(modifiedData);

        // Create workbook and add worksheet
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

        // Save workbook as XLSX
        var today = new Date();
        var fileName = 'laporan_' + today.getFullYear() + (today.getMonth() + 1) + today.getDate() + '.xlsx';
        XLSX.writeFile(workbook, fileName);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

