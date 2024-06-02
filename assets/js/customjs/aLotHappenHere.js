function custFunc() {
    //=====================================================================
    // Set maximal selection length
    //=====================================================================
    $(".select2-multiple").select2({
        maximumSelectionLength: 3
    });

    //=====================================================================
    // Changes the order of items - item selected by user are moved to the end.
    //=====================================================================
    $("select").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });

    //Get length of pegawai
    var pegLength = $('.pegawai').val().length;

    var listNamaPegawai = "";

    //Looping to get multiselect selected options value
    for (let index = 0; index < $('.pegawai').val().length; index++) {
        listNamaPegawai += $('.pegawai').val()[index] + " ";
    }

    //find element 'jmlPeg' and set value to length of pegawai
    var jp = document.getElementById('jmlPeg');
    jp.value = pegLength;

    //find element 'namaPeg' and set value to all selected 
    var np = document.getElementById('namaPeg');
    np.value = listNamaPegawai;

    //=====================================================================
    // Days calculations for UH
    //=====================================================================
    var date1 = new Date(document.getElementById('startDate').value);
    var date2 = new Date(document.getElementById('endDate').value);
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());

    var days = Math.floor(timeDiff / (1000 * 3600 * 24));

    var biaya = document.getElementById('totalBiaya');

    // if (document.getElementById('lebihdari8jam').value != '') {
    //     biaya.value = (160000 + document.getElementById('uangtransport').value) * pegLength * (days + 1);
    // } else {
    //     biaya.value = 125000 * pegLength * (days + 1);
    // }

    biaya.value = 125000 * pegLength * (days + 1);
    //=====================================================================
    // Convert biaya to word
    //=====================================================================

    if (biaya.value != '') {
        $.post('/assets/ajax/numbertoword.php', {
            number: biaya.value
        }, function(data) {
            document.getElementById('totalBiayaTerbilang').value = data;
        })
    }

    //=====================================================================
    // Check if that pegawai already do perdin on that specific location 
    // and on that specific date
    //=====================================================================
    if (document.getElementById('startDate').value != '' &&
        document.getElementById('kota-kecamatan').value != '') {
        $.post('/assets/ajax/checkPrevData.php', {
            tanggal: document.getElementById('startDate').value,
            lokasi: document.getElementById('kota-kecamatan').value,
            namaPegawai: $('.pegawai').val()[($('.pegawai').val().length) - 1]
        }, function(data) {
            if (data != '') {
                // alert(
                //     $('.pegawai').val()[($('.pegawai').val().length) - 1] +
                //     " sudah pernah melakukan \nperjalanan dinas ke " +
                //     document.getElementById('startDate').value +
                //     " pada tanggal " + document.getElementById('startDate').value);

                document.getElementById('pernah-perdin').innerHTML =
                    $('.pegawai').val()[($('.pegawai').val().length) - 1] +
                    " sudah pernah melakukan \nperjalanan dinas ke " +
                    document.getElementById('kota-kecamatan').value +
                    " pada tanggal " + document.getElementById('startDate').value;

                // $(".pegawai").val([]).change();
            }
        })
    }

    //=====================================================================
    // Get data nip and jabatan based on pegawai name
    //=====================================================================
    for (let index = 0; index < $('.pegawai').val().length; index++) {
        var np = $('.pegawai').val()[index];
        if (np != '') {
            //NamaPegawai
            $.post('/assets/ajax/nampeg.php', {
                nampeg: np
            }, function(data) {
                document.getElementById('peg' + (index + 1)).value = data;
            });
            //NIP
            $.post('/assets/ajax/nip.php', {
                nampeg: np
            }, function(data) {
                document.getElementById('nip' + (index + 1)).value = data;
            });
            //Jabatan
            $.post('/assets/ajax/jabatan.php', {
                nampeg: np
            }, function(data) {
                document.getElementById('jab' + (index + 1)).value = data;
            });
            //Pangkat
            $.post('/assets/ajax/pangkat.php', {
                nampeg: np
            }, function(data) {
                document.getElementById('pan' + (index + 1)).value = data;
            });
            //Golongan
            $.post('/assets/ajax/golongan.php', {
                nampeg: np
            }, function(data) {
                document.getElementById('gol' + (index + 1)).value = data;
            });
        }
    }
}