document.getElementById("startDate").onchange = function() {
    getDay();
    calculateDuration();
};

function getDay() {
    var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    document.getElementById('hari').value = listHari[new Date(document.getElementById('startDate').value).getDay()];

    var listHari = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    document.getElementById('bulan').value = listHari[new Date(document.getElementById('startDate').value).getMonth()];
}

document.getElementById("endDate").onchange = function() {
    calculateDuration()
};

function calculateDuration() {

    var durasi_hari = document.getElementById('durasi');

    var date1 = new Date(document.getElementById('startDate').value);
    var date2 = new Date(document.getElementById('endDate').value);
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());

    var days = Math.floor(timeDiff / (1000 * 3600 * 24));
    // var months = Math.floor(days / 31);
    // var years = Math.floor(months / 12);

    durasi_hari.value = days + 1 + " hari";
    document.getElementById('durasinumonly').value = days + 1;

    //Durasi Terbilang
    if (durasi_hari.value != '') {
        $.post('/assets/ajax/numbertoword.php', {
            number: durasi_hari.value
        }, function(data) {
            document.getElementById('durasiTerbilang').value = data;
        })
    }
}