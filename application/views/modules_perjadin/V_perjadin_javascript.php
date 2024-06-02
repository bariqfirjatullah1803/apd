<!-- ================== -->
<!-- ANCHOR JAVASCRIPT  -->
<!-- ================== -->

    <script>
        // =========================================================================================                    
        // NOTE {INITIALIZE | NEED PROPER DOCS }
        // 

            // @ dont forget copy this part @
            var gebid = function(id)
                {
                    return document.getElementById(id);
                };
            // @ dont forget copy this part @

            var maximumSelectionLengthPegawai = 20;
            var maximumSelectionLengthPPTK = 1;

            var listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var listBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var listBulan_en = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            var duration_in_days = 0;
            var nominal_ut_global = 0;

            var politicalTitleList = ['Bupati', 'Wakil Bupati'];
            var specialTitleList = ['Sekretaris Daerah', 'Asisten Administrasi Umum', 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'Asisten Perekonomian dan Pembangunan'];

            // {Special Name}
                var Bupati = 'Drs. H.M. SANUSI, MM';
                var WakilBupati = 'Drs. H. DIDIK GATOT SUBROTO, SH., MH';
                var SEKDA = 'Dr. Ir. WAHYU HIDAYAT, M.M.';
                var AS1 = 'Drs. SUWADJI, S.IP., M.Si.';
                var AS2 = 'Drs. IRIANTORO, M.Si.';
                var AS3 = 'Dra. MURSYIDAH, Apt, M.Kes.';
                var StafAhli1 = 'Ir. HOLIDIN, M.M.';
                var StafAhli2 = 'drg. MARHENDRAJAYA, M.M., Sp.KG.';
                var StafAhli3 = 'Dr. Ir. BACHRUDIN, M.Si.,MT.';
                var esl2Name = '';
                var esl2NameAmount = 0;
                var esl1NominalRep = 125000;
                var esl2NominalRep = 75000;
            // 

            var TYPE_OF_PERJADIN = gebid('type-of-perjadin-container').value;
        // 
        // =========================================================================================
        // NOTE { SPECIAL FUNCTION | NEED OPTIMIZATIONS AND PROPER DOCS }
        // 
            // TESTED AND WORKED
            function terbilang(a){
                var bilangan = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas'];

                // 1 - 11
                if(a < 12){
                    var kalimat = bilangan[a];
                }
                // 12 - 19
                else if(a < 20){
                    var kalimat = bilangan[a-10]+' Belas';
                }
                // 20 - 99
                else if(a < 100){
                    var utama = a/10;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%10;
                    var kalimat = bilangan[depan]+' Puluh '+bilangan[belakang];
                }
                // 100 - 199
                else if(a < 200){
                    var kalimat = 'Seratus '+ terbilang(a - 100);
                }
                // 200 - 999
                else if(a < 1000){
                    var utama = a/100;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%100;
                    var kalimat = bilangan[depan] + ' Ratus '+ terbilang(belakang);
                }
                // 1,000 - 1,999
                else if(a < 2000){
                    var kalimat = 'Seribu '+ terbilang(a - 1000);
                }
                // 2,000 - 9,999
                else if(a < 10000){
                    var utama = a/1000;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%1000;
                    var kalimat = bilangan[depan] + ' Ribu '+ terbilang(belakang);
                }
                // 10,000 - 99,999
                else if(a < 100000){
                    var utama = a/100;
                    var depan = parseInt(String(utama).substr(0,2));
                    var belakang = a%1000;
                    var kalimat = terbilang(depan) + ' Ribu '+ terbilang(belakang);
                }
                // 100,000 - 999,999
                else if(a < 1000000){
                    var utama = a/1000;
                    var depan = parseInt(String(utama).substr(0,3));
                    var belakang = a%1000;
                    var kalimat = terbilang(depan) + ' Ribu '+ terbilang(belakang);
                }
                // 1,000,000 - 	99,999,999
                else if(a < 100000000){
                    var utama = a/1000000;
                    var depan = parseInt(String(utama).substr(0,4));
                    var belakang = a%1000000;
                    var kalimat = terbilang(depan) + ' Juta '+ terbilang(belakang);
                }
                else if(a < 1000000000){
                    var utama = a/1000000;
                    var depan = parseInt(String(utama).substr(0,4));
                    var belakang = a%1000000;
                    var kalimat = terbilang(depan) + ' Juta '+ terbilang(belakang);
                }
                else if(a < 10000000000){
                    var utama = a/1000000000;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%1000000000;
                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                }
                else if(a < 100000000000){
                    var utama = a/1000000000;
                    var depan = parseInt(String(utama).substr(0,2));
                    var belakang = a%1000000000;
                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                }
                else if(a < 1000000000000){
                    var utama = a/1000000000;
                    var depan = parseInt(String(utama).substr(0,3));
                    var belakang = a%1000000000;
                    var kalimat = terbilang(depan) + ' Milyar '+ terbilang(belakang);
                }
                else if(a < 10000000000000){
                    var utama = a/10000000000;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%10000000000;
                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                }
                else if(a < 100000000000000){
                    var utama = a/1000000000000;
                    var depan = parseInt(String(utama).substr(0,2));
                    var belakang = a%1000000000000;
                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                }

                else if(a < 1000000000000000){
                    var utama = a/1000000000000;
                    var depan = parseInt(String(utama).substr(0,3));
                    var belakang = a%1000000000000;
                    var kalimat = terbilang(depan) + ' Triliun '+ terbilang(belakang);
                }

                else if(a < 10000000000000000){
                    var utama = a/1000000000000000;
                    var depan = parseInt(String(utama).substr(0,1));
                    var belakang = a%1000000000000000;
                    var kalimat = terbilang(depan) + ' Kuadriliun '+ terbilang(belakang);
                }

                var pisah = kalimat.split(' ');
                var full = [];
                for(var i=0;i<pisah.length;i++){
                    if(pisah[i] != ""){
                        full.push(pisah[i]);
                    }
                }
                return full.join(' ');
            }

            // TESTED AND WORKED
            function ajaxGetDetails(input, index, ajaxPath, output){
                var np = $(input).val()[index];
                //Golongan
                $.post('<?= base_url() ?>'+ ajaxPath, {
                    nampeg: np
                }, function(data) {
                    gebid(output).value = data;
                });
            }

            function ajaxGetKabagDetails(ajaxPath, output){
                var idBag = gebid('idbagian-container').value;
                $.post('<?= base_url() ?>'+ ajaxPath, {
                    input: idBag
                }, function(data) {
                    gebid(output).value = data;
                });
            }
        // 
        // =========================================================================================
        // SECTION { RADIO BUTTON RELATED FUNCTION }
        // 

            /**
             * name isIncludeToUmum
             * what this does : 
             *      as parameter to be used in getIsIncludedToUmumValue
             */
            var isIncludedToUmum = "";

            /**
             * name preferredInputMethod
             * what this does : 
             *      as parameter to be used in getPrefferedInputMethod
             */
            var preferredInputMethod = "";

            /**
             * name isMoreThanEightHour
             * what this does : 
             *      as parameter to be used in getIsMoreThanEightHour
             */
            var isMoreThanEightHour = "";

            /**
             * name biayaPenginapanInput
             * what this does : 
             *      as parameter to be used in setDisplayForBiayaPenginapanInput
             */
            var biayaPenginapanInput = "";

            /**
             * name biayaPenginapanInput
             * what this does : 
             *      as parameter to be used in setDisplayForTransportationInput
             */
            var jenisTransportationInput = "";

            /**
             * ANCHOR getRadioButtonValue
             * function getRadioButtonValue(variable, radioButtonName)
             * what this does :
             *  this function used in radio button onchange function to get the radio button value and return it to variable
             * 
             * param : 
             *  @variable 
             *      describe what variable will store the returned value.
             * 
             *  @radioButtonName 
             *      name of radioButton selected.
             * 
             * return :
             *  return the value of selected radio button to a variable.
             */
            function getRadioButtonValue(variable, radioButtonName){
                return variable = document.querySelector('input[name='+radioButtonName+']:checked').value;
            }

            /**
             * ANCHOR getIsIncludedToUmumValue
             * function getIsIncludedToUmumValue()
             * what this does :
             *  This function is used when onchange in radio button named : radio-titip-bagian-umum is triggered
             * 
             * param : none
             * 
             * return :
             *  run the function 'fillKegiatanOptions' to fill the kegiatan-input based on returned value from 
             *  getRadioButtonValue(isIncludedToUmum, 'radio-titip-bagian-umum')
             */
            function getIsIncludedToUmumValue(){
                // run the functions
                fillKegiatanOptions(getRadioButtonValue(isIncludedToUmum, 'radio-titip-bagian-umum'));

                // store value of radio button to container
                gebid('status-container').value = getRadioButtonValue(isIncludedToUmum, 'radio-titip-bagian-umum');
            }

            /**
             * ANCHOR getPrefferedInputMethod
             * function getPrefferedInputMethod()
             * what this does :
             *  This function is used when onchange in radio button named : radio-metode-input is triggered
             * 
             * param : none
             * 
             * return :
             *  - if getRadioButtonValue(preferredInputMethod, 'radio-metode-input' value is 'dropdown' 
             *      - show the input area (named kegiatan-dropdown-input) else hide it
             * 
             *  - if getRadioButtonValue(preferredInputMethod, 'radio-metode-input' value is 'manual' 
             *      - show the input area (named kegiatan-manual-input) else hide it
             */
            function getPrefferedInputMethod(){

                if (getRadioButtonValue(preferredInputMethod, 'radio-metode-input') == 'dropdown') {
                    document.getElementById("kegiatan-dropdown-input").style.display = "";
                } else{
                    document.getElementById("kegiatan-dropdown-input").style.display = "none";
                }

                if (getRadioButtonValue(preferredInputMethod, 'radio-metode-input') == 'manual') {
                    document.getElementById("kegiatan-manual-input").style.display = "";
                } else{
                    document.getElementById("kegiatan-manual-input").style.display = "none";
                }
            }

            /**
             * ANCHOR setDisplayForBiayaPenginapanInput
             * function setDisplayForBiayaPenginapanInput
             * what this does :
             *  This function is used when onchange in radio button named : radio-biaya-penginapan is triggered
             * 
             * param : none
             * 
             * return :
             *  - if getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan' value is 1
             *      - show the input area (named penginapan-setara) else hide it
             * 
             *  - if getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan' value is 0
             *      - show the input area (named penginapan-tidak-setara) else hide it
             */

            function setDisplayForBiayaPenginapanInput(){
                
                /**
                 * 1 == Setara
                 * 0 == Tidak Setara
                 */
                if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {
                    document.getElementById("penginapan-setara").style.display = "";
                } else{
                    document.getElementById("penginapan-setara").style.display = "none";
                }

                if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 0) {
                    // Get length of selected pegawai
                    generateInputFieldsForPenginapan($('.pegawai-input').val().length);
                    document.getElementById("penginapan-tidak-setara").style.display = "";
                } else{
                    document.getElementById("penginapan-tidak-setara").style.display = "none";
                }

                gebid('status-biaya-penginapan-container').value = getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan');
            }

            /**
             * ANCHOR setDisplayForTransportationInput
             * function setDisplayForTransportationInput
             * what this does :
             *  This function is used when onchange in radio button named : radio-jenis-transportation is triggered
             * 
             * param : none
             * 
             * return :
             *  - if getRadioButtonValue(jenisTransportationInput, 'radio-jenis-transportation' value is 1
             *      - show the input area (named penginapan-setara) else hide it
             * 
             *  - if getRadioButtonValue(jenisTransportationInput, 'radio-jenis-transportation' value is 0
             *      - show the input area (named penginapan-tidak-setara) else hide it
             */
            function setDisplayForTransportationInput(){
                /**
                 * 1 == Jenis transport sama (PP)
                 * 0 == Jenis transport tidak sama untuk PP
                 */

                if (getRadioButtonValue(jenisTransportationInput, 'radio-jenis-transportasi') == 1) {
                    gebid('jenis-transportasi-container').value = getRadioButtonValue(jenisTransportationInput, 'radio-jenis-transportasi');
                    document.getElementById("div-moda-transportasi-input-sama").style.display = "";
                } else{
                    document.getElementById("div-moda-transportasi-input-sama").style.display = "none";
                }
            }
            // !SECTION
            
        // 
        // =========================================================================================
        // SECTION { KEGIATAN - SUB KEGIATAN }
        // 

            /**
             * ANCHOR cleanDropDown
             * function cleanDropDown(dropdownId)
             * what this does : 
             *  this function clean dropdown options except the first one
             * 
             * param :
             *  @dropdownId
             *      determine the id of dropdown to be removed
             * 
             * return :
             *  cleaned dropdown
             */
            function cleanDropDown(dropdownId){
                $('#'+dropdownId+'').find('option').not(':first').remove();
            }

            /**
             * ANCHOR processOptionsData
             * function processOptionsData(data, dropdownId)
             * what this does :
             *  this function process returned data from ajax
             * 
             * param :
             *  @data
             *      this param contain data returned from ajax
             * 
             *  @dropdownId
             *      this param contain dropdownId to be filled with options
             * 
             * return :
             *  dropdownId filled with options
             */
            function processOptionsData(data, dropdownId){
                splittedResult = data.split('|');
                for (let i = 0; i < splittedResult.length-1; i++) {
                    $('#'+dropdownId+'').append('<option>'+splittedResult[i]+'</option>');
                }
            }

            /**
             * ANCHOR fillKegiatanOptions
             * function fillKegiatanOptions(inputParam)
             * what this does :
             *  this function fill the dropdown for program depend on the inputParam
             * 
             * param :
             *  @inputParam
             *      inputParam is value from getRadioButtonValue(isIncludedToUmum, 'radio-titip-bagian-umum')
             * 
             * return :
             *  fill the kegiatan-input based on inputParam
             *  if inputParam value is 1 : fill the kegiatan-input with kegiatan from bagian umum
             *  if inputParam value is 0 : fill the kegiatan-input with kegiatan from each bagian
             */
            function fillKegiatanOptions(inputParam){
                
                cleanDropDown('kegiatan-input');

                if (inputParam == 1) {
                    $.post('<?= base_url() ?>assets/ajax/getKegiatanDesc.php', {
                        kegiatan: 7,
                    }, function(data){
                        console.log("output " + data);
                        processOptionsData(data, 'kegiatan-input');
                        
                    });   
                }else{
                    $.post('<?= base_url() ?>assets/ajax/getKegiatanDesc.php', {
                        kegiatan: gebid('idbagian-container').value,
                    }, function(data){
                        console.log("output " + data);
                        processOptionsData(data, 'kegiatan-input');
                    }); 
                }
            }

            /**
             * ANCHOR fillSubKegiatanOptions
             * function fillSubKegiatanOptions()
             * what it does :
             *  this function load subkegiatan options from selected kegiatan
             * 
             * param :
             *  none
             * 
             * return :
             *  sub-kegiatan-input loaded with options
             */
            function fillSubKegiatanOptions(){

                var delayTimer;

                // Clear all timeout
                clearTimeout(delayTimer);

                // Remove all options 
                cleanDropDown('sub-kegiatan-input');

                // Set new timeout
                delayTimer = setTimeout(function() {

                    $.post('<?= base_url() ?>assets/ajax/getSubKegiatanDesc.php', {
                        kegiatan: gebid('kode-kegiatan-container').value,
                    }, function(data){
                        console.log("output " + data);
                        processOptionsData(data, 'sub-kegiatan-input');
                        
                    });

                }, 100); // Will do the ajax stuff after 1000 ms, or 1 s
            }

            /**
             * ANCHOR onChangeKodeKegiatan
             * function onChangeKodeKegiatan()
             * what this does:
             *  - this function restrict kegiatan-input to allow only 1 selection
             *  - set value from selected multi-select to container
             *  - get kode-kegiatan from selected kegiatan
             *  - load options for subkegiatan from selected kegiatan
             * 
             * param :
             *  none
             * 
             * return :
             *  - value of selected kegiatan, stored inside container
             *  - kode-kegiatan from selected kegiatan, stored inside container
             *  - run fillSubKegiatanOptions()
             */
            function onChangeKodeKegiatan(){
                $('#kegiatan-input').select2({
                    maximumSelectionLength:1
                });

                gebid('nama-kegiatan-container').value = $(".kegiatan-input").val();

                // {Get kode kegiatan}
                $.post('<?= base_url() ?>assets/ajax/getKodeKegiatan.php', {
                    kegiatan: gebid('nama-kegiatan-container').value,
                }, function(data) {
                    gebid('kode-kegiatan-container').value = data;
                });

                fillSubKegiatanOptions();
            }

            /**
             * ANCHOR onChangeKodeSubKegiatan
             * function onChangeKodeSubKegiatan()
             * what this does:
             *  - this function restrict sub-kegiatan-input to allow only 1 selection
             *  - set value from selected multi-select to container
             *  - get kode-sub-kegiatan from selected sub-kegiatan
             * 
             * param :
             *  none
             * 
             * return :
             *  - value of selected sub0kegiatan, stored inside container
             *  - kode-sub-kegiatan from selected sub-kegiatan, stored inside container
             */
            function onChangeKodeSubKegiatan(){
                $('#sub-kegiatan-input').select2({
                    maximumSelectionLength:1
                });

                gebid('nama-sub-kegiatan-container').value = $(".sub-kegiatan-input").val();

                // {Get kode kegiatan}
                $.post('<?= base_url() ?>assets/ajax/getSubKegiatanId.php', {
                    kegiatan: gebid('nama-sub-kegiatan-container').value,
                }, function(data) {
                    gebid('kode-sub-kegiatan-container').value = data;
                });
            }

            /**
             * ANCHOR onChangeKodeKegiatanManualInput
             * function onChangeKodeKegiatanManualInput(), onChangeDescKegiatanManualInput(), onChangeKodeSubKegiatanManualInput(), onChangeDescSubKegiatanManualInput()
             * What this does:
             *  these 4 are function for storing value from user input to container
             * 
             * param :
             *  none
             * 
             * return :
             *  stored value of kode kegiatan, kode sub kegiatan, nama kegiatan, and nama sub kegiatan
             */
                function onChangeKodeKegiatanManualInput(){
                    gebid('kode-kegiatan-container').value = gebid('kode-kegiatan-user-input').value;
                }

                function onChangeDescKegiatanManualInput(){
                    gebid('nama-kegiatan-container').value = gebid('nama-kegiatan-user-input').value;
                }

                function onChangeKodeSubKegiatanManualInput(){
                    gebid('kode-sub-kegiatan-container').value = gebid('kode-sub-kegiatan-user-input').value;
                }

                function onChangeDescSubKegiatanManualInput(){
                    gebid('nama-sub-kegiatan-container').value = gebid('nama-sub-kegiatan-user-input').value;
                }
            // 
        // !SECTION
        // =========================================================================================
        // SECTION { DATE AND TIME | NEED PROPER DOCS }
        // 
            // ANCHOR ONCHANGE startDate
            document.getElementById("startDate").onchange = function() {
                getDay();
                calculateDuration();
            };

            // ANCHOR ONCHANGE endDate
            document.getElementById("endDate").onchange = function() {
                getEndDay();
                calculateDuration()
            };

            /**
             * qr : 
             * input -> {startDate}
             * output -> 
             * for data like :  
             *  a. {Kamis}          stored inside {hari-container}
             *  b. {Januari}        stored inside {bulan-container}
             *  c. {2022-10-15}     stored inside {date-sorter-container}
             */
            // ANCHOR getDay
            function getDay() {
                // Mengambil hari perjalanan dinas
                document.getElementById('hari-container').value = listHari[new Date(document.getElementById('startDate').value).getDay()];

                // Mengambil nama bulan perjalanan dinas
                document.getElementById('bulan-container').value = listBulan[new Date(document.getElementById('startDate').value).getMonth()];

                var getDate = new Date(document.getElementById('startDate').value).getFullYear() + "-" + 
                            (new Date(document.getElementById('startDate').value).getMonth()+1) + "-" + 
                            new Date(document.getElementById('startDate').value).getDate();

                document.getElementById('date-sorter-container').value = getDate;
            }

            // ANCHOR getEndDay
            function getEndDay(){
                document.getElementById('hari-sampai-container').value = listHari[new Date(document.getElementById('endDate').value).getDay()];
            }

            /**
             * qr : 
             * for data like :  
                a. {1 Juni 2022 s/d 2 juni 2022} stored inside {tanggal-berangkat-kembali-container}
                b. {1 hari} stored inside {durasi-dengan-hari-container}
                c. {1} stored inside {durasi-tanpa-hari-container}
                d. {satu} stored inside {durasi-terbilang-container}
                e. {1 Juni 2022} stored inside {tanggal-berangkat-container} and {tanggal-pulang-container}

            */
            // ANCHOR calculateDuration
            function calculateDuration() {

                var tanggal_berangkat = new Date(document.getElementById('startDate').value);
                var tanggal_pulang = new Date(document.getElementById('endDate').value);
                var timeDiff = Math.abs(tanggal_pulang.getTime() - tanggal_berangkat.getTime());

                duration_in_days = (Math.floor(timeDiff / (1000 * 3600 * 24)))+1;
                var duration_in_months = Math.floor(duration_in_days / 31);
                var duration_in_years = Math.floor(duration_in_months / 12);

                // Durasi dengan hari
                document.getElementById('durasi-dengan-hari-container').value = duration_in_days + " hari";                            

                // Durasi tanpa hari
                document.getElementById('durasi-tanpa-hari-container').value = duration_in_days;

                // Durasi terbilang
                document.getElementById('durasi-terbilang-container').value = terbilang(duration_in_days);

                // return data with format like this -> DD-MM-YYYY
                var departure =  
                    new Date(document.getElementById('startDate').value).getDate() +" "+ 
                    listBulan[new Date(document.getElementById('startDate').value).getMonth()] + ", " + 
                    new Date(document.getElementById('startDate').value).getFullYear();

                var departure_en = 
                    new Date(document.getElementById('startDate').value).getDate() +" "+ 
                    listBulan_en[new Date(document.getElementById('startDate').value).getMonth()] + ", " + 
                    new Date(document.getElementById('startDate').value).getFullYear();

                // return data with format like this -> DD-MM-YYYY
                var arrival =  
                    new Date(document.getElementById('endDate').value).getDate() +" "+ 
                    listBulan[new Date(document.getElementById('endDate').value).getMonth()] + " " + 
                    new Date(document.getElementById('endDate').value).getFullYear();


                gebid('tanggal-berangkat-kembali-container').value = departure + " s/d " + arrival;
                gebid('tanggal-berangkat-container').value = departure;
                gebid('tanggal-berangkat-en-container').value = departure_en;
                gebid('tanggal-kembali-container').value = arrival;

            }
        // !SECTION
        // =========================================================================================
        // SECTION { KOTA TUJUAN }
        // 
            /**
             * ANCHOR getIsMoreThanEightHour
             * function getIsMoreThanEightHour()
             * what this does :
             *  This function is used when onchange in radio button named : radio-lebih-dari-delapan-jam is triggered
             * 
             * param : none
             * 
             * return :
             *  set maximum selection length to 1 if radiobuttonvalue equal 1, else 3 if equal 0
             */
            function getIsMoreThanEightHour(){
                if (getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam') == 1) {
                    $(".kota-tujuan-input").select2({
                        maximumSelectionLength: 1
                    });
                } else {
                    $(".kota-tujuan-input").select2({
                        maximumSelectionLength: 3
                    });
                }
            }

            /**
             * ANCHOR onChangeKotaTujuan
             * function onChangeKotaTujuan
             * what this does :
             *  this function is triggered when user select kota in kota-tujuan-input (dropdown)
             * 
             * param :
             *  none
             * 
             * return :
             *  - value of kota-tujuan-input is stored inside kota-container
             *  - nominal-ut-container is returned by ajax function and stored inside 
             */

            function onChangeKotaTujuan(){
                //=====================================================================
                // {Set maximal selection length}
                //=====================================================================
                gebid('kota-container').value = $('.kota-tujuan-input').val();

                if (
                    gebid('type-of-perjadin-container').value == '<?php echo ISDD ?>' || 
                    gebid('type-of-perjadin-container').value == '<?php echo ISLD ?>' ) {

                        $.post('<?= base_url() ?>assets/ajax/getUangTransportValue.php', {
                            cityName: gebid('kota-container').value,
                        }, function(data) {
                            document.getElementById('nominal-ut-container').value = data;

                            // Load Data BBM for Perjadin Luar Daerah
                            if (gebid('type-of-perjadin-container').value == '<?php echo ISLD ?>') {
                                document.getElementById('bbm-max').value = data;   
                            }
                        
                            console.log(data);
                        });

                } else if(gebid('type-of-perjadin-container').value == '<?php echo ISLP ?>'){

                    // Set UH Provinsi
                    $.post('<?= base_url() ?>assets/ajax/getProvUH.php', {
                        provName: gebid('kota-container').value,
                    }, function(data) {
                        document.getElementById('nominal-uh-container').value = data;
                        console.log(data);
                    });

                    // Set Taksi di Provinsi Keberangkatan
                    $.post('<?= base_url() ?>assets/ajax/getProvTaksi.php', {
                        provName: 'JAWA TIMUR',
                    }, function(data) {
                        // {Set}
                        document.getElementById('moda-transportasi-input-sama-taksi-berangkat-lumpsum').value = data;
                    });

                    // Set Taksi di Provinsi Tujuan
                    $.post('<?= base_url() ?>assets/ajax/getProvTaksi.php', {
                        provName: gebid('kota-container').value,
                    }, function(data) {
                        // {Set}
                        document.getElementById('moda-transportasi-input-sama-taksi-pulang-lumpsum').value = data;
                    });


                }
                
            }
        // !SECTION
        // =========================================================================================
        // SECTION {PEGAWAI | NEED PROPER DOCS } 
        // 

            /**
             * ANCHOR checkForPreviousTrip
             * Used in onChangePegawai
             */
            function checkForPreviousTrip(){
                //=====================================================================
                // Check if that pegawai already do perdin on that specific location 
                // and on that specific date
                //=====================================================================\
                //#region Check if that pegawai already do perdin on that specific location and on that specific date

                var tanggalBerangkat = gebid('tanggal-berangkat-container').value;
                var kotaTujuan = gebid('kota-container').value;
                
                // How line below works : 
                // get value of pegawai[index]
                // because array start from 0 while length is start from 1, we reduce it by 1
                var namaPegawaiYangDipilih = $('.pegawai-input').val()[($('.pegawai-input').val().length) - 1];

                // FIXME : @ I DONT KNOW HOW TO FIX THIS, YET (12/JUNE/2022) @
                // console.log("INDEX[0] " + $('.pegawai-input').val()[0]);
                // console.log("INDEX[1] " + $('.pegawai-input').val()[1]);
                // console.log("INDEX[2] " + $('.pegawai-input').val()[2]);
                // console.log("INDEX[3] " + $('.pegawai-input').val()[3]);

                if (tanggalBerangkat != '' && kotaTujuan != '') 
                {
                    $.post('<?= base_url() ?>assets/ajax/getPreviousPerdin.php', {
                        tanggal: tanggalBerangkat,
                        lokasi: kotaTujuan,
                        namaPegawai: namaPegawaiYangDipilih
                    }, function(data) {
                        console.log('checkForPreviousTrip() : '+tanggalBerangkat +' ' + kotaTujuan + ' ' + namaPegawaiYangDipilih);
                        console.log('Data prev ' + data);
                        if (data != '') {
                            document.getElementById("div-pernah-perdin").style.display = "";
                            gebid('pernah-perdin').innerHTML =
                                namaPegawaiYangDipilih + " sudah pernah melakukan \nperjalanan dinas ke " +
                                kotaTujuan + " pada tanggal " + tanggalBerangkat;

                        }else{
                            document.getElementById("div-pernah-perdin").style.display = "none";
                            document.getElementById('pernah-perdin').innerHTML = '';
                        }
                    })
                }
                    
                //#endregion
            }

            /**
             * ANCHOR rearrangePegawaiList
             * Used in onChangePegawai
             */
            function rearrangePegawaiList(){
                //=========================================================================
                // Changes the order of items - item selected by user are moved to the end.
                //==========================================================================
                $("select").on("select2:select", function(evt) {
                    var element = evt.params.data.element;
                    var $element = $(element);

                    $element.detach();
                    $(this).append($element);
                    // $(this).trigger("change");
                });
            }

            /** 
                * qr : 
                * input -> {pegawai-input}
                * output ->
                * {nama-pegawai-container-nth} | {nip-pegawai-container-nth} | {jab-pegawai-container-nth}
                * {pan-pegawai-container-nth}  | {gol-pegawai-container-nth} | {esl-pegawai-container-nth}
            */
            /**
             * ANCHOR getPegawaiDetails
             * Used in onChangePegawai
             */
            function getPegawaiDetails(){
                //=====================================================================
                // Get data nip and jabatan based on pegawai name
                //=====================================================================
                //#region Get data nip and jabatan based on pegawai name
                var jmlPegawai = gebid('jml-all-container');
                jmlPegawai.value = $('.pegawai-input').val().length;

                for (let index = 0; index < $('.pegawai-input').val().length; index++) {
                    var np = $('.pegawai-input').val()[index];
                    console.log(np);
                    if (np != '') {
                        
                        //NamaPegawai
                        $.post('<?= base_url() ?>assets/ajax/getPegNama.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('nama-pegawai-container-' + (index + 1)).value = data;
                        });
                        //NIP
                        $.post('<?= base_url() ?>assets/ajax/getPegNip.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('nip-pegawai-container-' + (index + 1)).value = data;
                        });
                        //Jabatan
                        $.post('<?= base_url() ?>assets/ajax/getPegJab.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('jab-pegawai-container-' + (index + 1)).value = data;
                        });
                        //Pangkat
                        $.post('<?= base_url() ?>assets/ajax/getPegPan.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('pan-pegawai-container-' + (index + 1)).value = data;
                        });
                        //Golongan
                        $.post('<?= base_url() ?>assets/ajax/getPegGol.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('gol-pegawai-container-' + (index + 1)).value = data;
                        });
                        //Golongan
                        $.post('<?= base_url() ?>assets/ajax/getPegEsl.php', {
                            nampeg: np
                        }, function(data) {
                            document.getElementById('esl-pegawai-container-' + (index + 1)).value = data;
                        });
                    }
                }
                //#endregion
            }

            /**
             * ANCHOR containPegawaiDetails
             * grab all pegawai details and contain inside nama-all-container etc
             * Used in finalConfirmations
             */
            function containPegawaiDetails(){

                // the dollar function $() can be used as shorthand for the getElementById Function
                var namaArray,  rearrangedNama, namaAllPegawai = "";
                var nipArray,   rearrangedNip,  nipAllPegawai = "";
                var golArray,   rearrangedGol,  golAllPegawai = "";
                var panArray,   rearrangedPan,  panAllPegawai = "";
                var jabArray,   rearrangedJab,  jabAllPegawai = "";
                var eslArray,   rearrangedEsl,  eslAllPegawai = "";

                //Looping to get multiselect selected options value
                for (let index = 0; index < $('.pegawai-input').val().length; index++) {
                    // namaAllPegawai += $('.pegawai').val()[index] + "; ";

                    namaAllPegawai += document.getElementById('nama-pegawai-container-'+(index+1)).value + ";";                                
                    nipAllPegawai += document.getElementById('nip-pegawai-container-'+(index+1)).value + ";";
                    golAllPegawai += document.getElementById('gol-pegawai-container-'+(index+1)).value + ";";
                    panAllPegawai += document.getElementById('pan-pegawai-container-'+(index+1)).value + ";";
                    jabAllPegawai += document.getElementById('jab-pegawai-container-'+(index+1)).value + ";";
                    eslAllPegawai += document.getElementById('esl-pegawai-container-'+(index+1)).value + ";";
                    // console.log("NIP "+document.getElementById('nip-pegawai-container-'+(index+1)).value);

                }
            
                // #region Processing String
                processDataPegawai(namaArray, namaAllPegawai, rearrangedNama, gebid('nama-all-container'));
                processDataPegawai(nipArray, nipAllPegawai, rearrangedNip, gebid('nip-all-container'));
                processDataPegawai(golArray, golAllPegawai, rearrangedGol, gebid('gol-all-container'));
                processDataPegawai(panArray, panAllPegawai, rearrangedPan, gebid('pan-all-container'));
                processDataPegawai(jabArray, jabAllPegawai, rearrangedJab, gebid('jab-all-container'));
                processDataPegawai(eslArray, eslAllPegawai, rearrangedEsl, gebid('esl-all-container'));
                //#endregion
            }

            /**
             * ANCHOR processDataPegawai
             * Used in finalConfirmations
             */
            function processDataPegawai(array, splitter, rearranged, container){
                /* The string are processed like this :
                * Step by step
                    1. Take the string containing all data
                    2. Split it as array using ";" as separator (namaAllPegawai.split(;))
                    3. Use shift() to remove the first array
                    4. Use push() to place removed element to last place
                    5. Use join() to return the array to one single string.
                
                * Why im doing this?
                    Because the last person in pegawai somehow is inserted as first in the string for all of this variable
                */ 

                array = splitter.split(";");
                array.push(array.shift());
                rearranged = array.join(";");
                container.value = rearranged;
            }

            /**
             * ANCHOR onChangePegawai
             * trigger collection of function when pegawai is selected.
             */
            function onChangePegawai(){
                $(".pegawai").select2({
                    maximumSelectionLength: maximumSelectionLengthPegawai
                });

                checkForPreviousTrip();
                rearrangePegawaiList();
                getPegawaiDetails();

                /**
                 * This need to be located below getPegawaiDetails() because it getting it data from result of getPegawaiDetails
                 */
                // checkIfThereAreSpecialTitle($('.pegawai-input').val().length);
            }
        // !SECTION
        // =========================================================================================
        // SECTION {YANG BERTANDATANGAN and KABAG | NEED PROPER DOCS} 
        // 

            
            /**
             * ANCHOR onChangeTTD
             */
            function onChangeTTD(){
                /*  Param details :
                    [1] id of multiple select
                    [2] index of multiple select selection
                    [3] path of ajax
                    [4] name of container
                */
                // Function is located in { SPECIAL FUNCTIONS }
                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegNama.php', 'nama-ttd-container');
                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegNip.php', 'nip-ttd-container');
                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegGol.php', 'gol-ttd-container');
                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegPan.php', 'pan-ttd-container');
                ajaxGetDetails('.ttd-input',0,'assets/ajax/getPegJab.php', 'jab-ttd-container');

                // =========================================================================================
                // {DATA KABAG} @ ALL FUNCTIONS INSIDE ARE TESTED AND WORKED @
                // =========================================================================================

                /*  Param details :
                    [1] path of ajax
                    [2] name of container
                */                                
                ajaxGetKabagDetails('assets/ajax/getKabagNama.php', 'nama-kabag-container');
                ajaxGetKabagDetails('assets/ajax/getKabagNip.php', 'nip-kabag-container');
                ajaxGetKabagDetails('assets/ajax/getKabagGol.php', 'gol-kabag-container');
                ajaxGetKabagDetails('assets/ajax/getKabagPan.php', 'pan-kabag-container');
                ajaxGetKabagDetails('assets/ajax/getKabagJab.php', 'jab-kabag-container');
            }
            
        // !SECTION
        // =========================================================================================
        // SECTION {PENGINAPAN | NEED PROPER DOCS } 
        //

            /**
             * ANCHOR generateInputFieldsForPenginapan
             * function generateInputFieldsForPenginapan(amountOfPegawai)
             * what this does :
             *  - hide div that unused
             * 
             * param :
             *  @amountOfPegawai
             *      amount of pegawai departing
             * 
             * return :
             *  amount of user input form that equal to the amount of "amountOfPegawai"
             */
            function generateInputFieldsForPenginapan(amountOfPegawai){

                // Hide accordion
                for (var index = 20; index > amountOfPegawai && index>0; index--) {

                    document.getElementById("penginapan-accordion-input-"+index).style.display = "none";

                    console.log(window.getComputedStyle(document.getElementById("penginapan-accordion-input-"+index)).display);
                }

                // Show accordion and input names into input fields
                for (var index = 1; index <= amountOfPegawai; index++) {

                    document.getElementById("penginapan-accordion-input-"+index).style.display = "";
                    /**
                     * Set value of input as pegawai index
                     */
                    if (index==1) {
                        gebid("penginapan-nama-pegawai-input-"+index).value = $('.pegawai-input').val()[0];
                    }else{
                        gebid("penginapan-nama-pegawai-input-"+index).value = $('.pegawai-input').val()[index-1];
                    }
                }
            }

            /**
             * ANCHOR storePenginapanTidakSetaraDetails
             * function storePenginapanTidakSetaraDetails()
             * 
             * What it does :
             *  Collect all nama and nominal as single string to be processed later in Models
             * 
             * param : 
             *  @amountOfPegawai :
             *      get pegawai length from multiselect
             * 
             * result :
             *  - all nama pegawai in penginapan stored as single strings separated by ";"
             *  - all nominal in penginapan stored as single strings separated by ";"
             */

             function storePenginapanTidakSetaraDetails(amountOfPegawai){
                var penginapanNamaAll, penginapanNominalAll = "";
                
                for (var index = 1; index <= amountOfPegawai; index++) {
                    console.log("storePenginapanTidakSetaraDetails : "+document.getElementById('penginapan-nama-pegawai-input-'+index).value);
                    penginapanNamaAll += document.getElementById('penginapan-nama-pegawai-input-'+index).value + ";";
                    penginapanNominalAll += document.getElementById('penginapan-biaya-per-malam-input-'+index).value + ";";
                }

                /**
                 * Remove undefined from string, i dont know where this unefined come from
                 */
                gebid('penginapan-nama-all-container').value = penginapanNamaAll.replace('undefined', '');
                gebid('penginapan-nominal-all-container').value = penginapanNominalAll;
             }
        // !SECTION
        // =========================================================================================
        // SECTION {TRANSPORTASI | NEED PROPER DOCS}
        // 
            /**
             * ANCHOR onChangeTransportation
             * onChangeTransportation
             * 
             * what it does :
             *     - set limit for selection length
             *     - 
             * 
             * param :
             *     
             * 
             * return :
             *     - moda-transportasi-input-sama max selection = 1
             */
            function onChangeTransportation(){
                $('#moda-transportasi-input-sama').select2({
                    maximumSelectionLength:1
                });

                gebid('moda-transportasi-container').value = $('.moda-transportasi-input-sama').val()[0];
                switch ($('.moda-transportasi-input-sama').val()[0]) {
                    // Mobil Pribadi
                    case "1":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "none";
                        console.log("switch 001");
                        break;
                    // Sewa Kendaraan
                    case "2":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "none";
                        console.log("switch 002");
                        break;
                    // Bus
                    case "3":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "";
                        console.log("switch 003");
                        break;
                    // Kapal
                    case "4":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "none";
                        console.log("switch 004");
                        break;
                    // Kereta
                    case "5":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "none";
                        console.log("switch 005");
                        break;
                    // Pesawat
                    case "6":
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-bus").style.display = "none";
                        console.log("switch 006");
                        break;
                    // Default
                    default:
                        gebid("div-moda-transportasi-input-sama-mobil-pribadi").style.display = "none";
                        gebid("div-moda-transportasi-input-sama-sewa-kendaraan").style.display = "none";
                        console.log("switch default");
                        break;
                }

                  
                
            }
        // !SECTION
        // =========================================================================================
        // SECTION {MONEY CALCULATIONS | NEED PROPER DOCS } 
        // 

            /**
             * ANCHOR determineUH
             * function determineUH()
             * 
             * what it does :
             *  determine if uh value based on whether is it DD, LD or LP
             * 
             * param :
             *  for DD :
             *      getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam')
             * 
             *  for LD :
             *      none
             * 
             *  for LP :
             *      ?
             * 
             * return :
             *  UH values stored inside nominal-uh-container
             */
            function determineUH(){
                
                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>) {
                    if (getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam') == 1) {   
                        gebid('nominal-uh-container').value = <?php echo "'" .UH_OVER_8. "'"?>;
                    } else {
                        gebid('nominal-uh-container').value = <?php echo "'" .UH_UNDER_8. "'"?>;
                    }
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>) {
                    gebid('nominal-uh-container').value = <?php echo "'" .UH_LD. "'"?>;

                }else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {
                    $.post('<?= base_url() ?>assets/ajax/getProvUH.php', {
                        provName: gebid('kota-container').value,
                    }, function(data) {
                        document.getElementById('nominal-uh-container').value = data;
                    
                        console.log(data);
                    });
                }
            }

            /**
             * ANCHOR calculateTotalUHPerPerson
             * function calculateUH()
             * what it does :
             *  calculate UH per person
             * 
             * param :
             *  @nominal-uh-container
             *      stored UH value from nominal-uh-container
             * 
             *  @durasi-tanpa-hari-container
             *      duration of perjadin
             * 
             *  @amountOfDestination
             *      amount of destination selected (max 3)
             * 
             * return :
             *  amount of total UH per person stored in nominal-uh-all-container
             */
            function calculateTotalUHPerPerson(amountOfDestination){

                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>) {

                    if (getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam') == 1) {
                        gebid('nominal-uh-all-container').value = parseInt(gebid('nominal-uh-container').value * gebid('durasi-tanpa-hari-container').value);
                    } else {
                        gebid('nominal-uh-all-container').value = gebid('nominal-uh-container').value * gebid('durasi-tanpa-hari-container').value * amountOfDestination;
                    }
                    
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>) {

                    gebid('nominal-uh-all-container').value = parseInt(gebid('nominal-uh-container').value * gebid('durasi-tanpa-hari-container').value);

                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {

                    gebid('nominal-uh-all-container').value = parseInt(gebid('nominal-uh-container').value * gebid('durasi-tanpa-hari-container').value);
                }
                
                // Set terbilang
                gebid('nominal-uh-all-terbilang-container').value = terbilang(gebid('nominal-uh-all-container').value);
            }

            /**
             * SECTION calculateTotalUTPerPerson
             * function calculateTotalUtPerPerson
             * what it does :
             *  calculate total UT per person
             * 
             * ##### things to consider :
             *  Perjalanan Dinas { Dalam Daerah - UT dibayarakan lumpsum }
             *  Perjalanan Dinas @ Luar Daerah  - UT dibayarakan AtCost @
             *  
             * param :
             *  @nominal-ut-container
             *      stored UT value from nominal-ut-container
             * 
             *  @durasi-tanpa-hari-container
             *      duration of perjadin
             *      
             * return :
             *  amount of total UT per person stored in nominal-uT-all-container
             */
            function calculateTotalUTPerPerson(){

                // ANCHOR ISDD
                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>) {

                    if (getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam') == 1) {   
                        gebid('nominal-ut-all-container').value = gebid('nominal-ut-container').value * gebid('durasi-tanpa-hari-container').value;
                    }else{
                        gebid('nominal-ut-all-container').value = 0;
                    }

                // ANCHOR ISLD
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>) {

                    /**
                     * nominal-ut-all-container is TOTAL PER PERSON, not TOTAL FOR WHOLE GROUP
                     */
                    gebid('nominal-ut-all-container').value = parseInt(gebid('bbm-input').value) + parseInt(gebid('biaya-tol-input').value);

                // SECTION ISLP
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {

                    console.log("BBM : " +gebid('moda-transportasi-input-sama-mobil-pribadi-bbm').value);
                    console.log("etoll : " +gebid('moda-transportasi-input-sama-mobil-pribadi-etoll').value);

                    // SECTION If jenis transportasi untuk PP sama
                    if (gebid('jenis-transportasi-container').value == 1) {

                        // ANCHOR Mobil Pribadi
                        if (gebid('moda-transportasi-container').value == 1) {
                            
                            gebid('nominal-ut-all-container').value = parseInt(gebid('moda-transportasi-input-sama-mobil-pribadi-bbm').value) + parseInt(gebid('moda-transportasi-input-sama-mobil-pribadi-etoll').value);

                        // ANCHOR Sewa Kendaraan
                        }else if (gebid('moda-transportasi-container').value == 2) {
                            
                            gebid('nominal-ut-all-container').value = parseInt(gebid('moda-transportasi-input-sama-sewa-kendaraan-biaya-sewa').value) + parseInt(gebid('moda-transportasi-input-sama-sewa-kendaraan-etoll').value);

                        // ANCHOR Bus
                        }else if (gebid('moda-transportasi-container').value == 3) {

                            var totalBiayaBus = parseInt(gebid('moda-transportasi-input-sama-bus-berangkat').value) + parseInt(gebid('moda-transportasi-input-sama-bus-pulang').value);
                            gebid('total-biaya-bus-container').value = parseInt(totalBiayaBus);

                            var totalTaksiLumpsum = parseInt(gebid('moda-transportasi-input-sama-taksi-berangkat-lumpsum').value) + parseInt(gebid('moda-transportasi-input-sama-taksi-pulang-lumpsum').value);
                            gebid('total-taksi-lumpsum-container').value = parseInt(totalTaksiLumpsum);
                            
                            var totalTaksiAtCost = parseInt(gebid('moda-transportasi-input-sama-taksi-berangkat-atcost').value) + parseInt(gebid('moda-transportasi-input-sama-taksi-pulang-atcost').value);
                            gebid('total-taksi-atcost-container').value = parseInt(totalTaksiAtCost);

                            gebid('nominal-ut-all-container').value = parseInt(totalBiayaBus) + parseInt(totalTaksiLumpsum * 2) + parseInt(totalTaksiAtCost);
                        }
                        
                    }
                    // !SECTION
                }
                // !SECTION
                
                // Set terbilang
                gebid('nominal-ut-all-terbilang-container').value = terbilang(gebid('nominal-ut-all-container').value);
            }
            // !SECTION

            /**
             * ANCHOR calculateForSpecialTitle
             * NEED DOCS
             */
            function calculateForSpecialTitle(amountOfPegawai){

                // PART 01 - Get the amount of Spc/Political Title

                /**
                 * variable for storing the amount of special title
                 */
                var spcTitleAmount = 0;
                var politicalTitleAmount = 0;

                /**
                 * Loop through the container
                 */
                for (var containerIndex = 1; containerIndex <= amountOfPegawai; containerIndex++) {
                    console.log("Jab "+containerIndex+" : "+gebid('jab-pegawai-container-' + (containerIndex)).value);

                    /**
                     * Loop through the array for specialTitle
                     */
                    for (var spcTitleIndex = 0; spcTitleIndex <= amountOfPegawai; spcTitleIndex++) {
                        console.log("Spc "+spcTitleIndex+" : "+specialTitleList[spcTitleIndex]);

                        /**
                         * If container value match array value
                         */
                        if (gebid('jab-pegawai-container-' + (containerIndex)).value == specialTitleList[spcTitleIndex]) {
                            console.log("Spc Title Detected");
                            /**
                             * increase the spcTitleAmount and escape the loop
                             */
                            spcTitleAmount = spcTitleAmount +1;
                            break;
                        }
                    }

                    /**
                     * Loop through the array for politicalTitleAmount
                     */
                    for (var politicalTitleIndex = 0; politicalTitleIndex <= amountOfPegawai; politicalTitleIndex++) {
                        console.log("Spc "+politicalTitleIndex+" : "+politicalTitleList[politicalTitleIndex]);

                        /**
                         * If container value match array value
                         */
                        if (gebid('jab-pegawai-container-' + (containerIndex)).value == politicalTitleList[politicalTitleIndex]) {
                            console.log("Political Title Detected");
                            /**
                             * increase the politicalTitleAmount and escape the loop
                             */
                            politicalTitleAmount = politicalTitleAmount +1;
                            break;
                        }
                    }
                }

                console.log("spcTitleAmount :"+spcTitleAmount);
                console.log("politicalTitleAmount :"+politicalTitleAmount);

                gebid('spc-title-amount-container').value = spcTitleAmount;
                gebid('political-title-amount-container').value = politicalTitleAmount;

                // PART 02

                var totalUangRepresentatif = 0;

                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>){
                    if (getRadioButtonValue(isMoreThanEightHour, 'radio-lebih-dari-delapan-jam') == 1) {   
                        totalUangRepresentatif = 
                            (parseInt(<?php echo "'" .REPRESENTASI_DD_SEKDA_ASISTEN. "'"?>) * spcTitleAmount) + 
                            (parseInt(<?php echo "'" .REPRESENTASI_DD_BUPATI_WAKIL. "'"?>) * politicalTitleAmount);
                    } else {
                        totalUangRepresentatif = 0;
                    }
                }else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>){
                    totalUangRepresentatif = 
                        (parseInt(<?php echo "'" .REPRESENTASI_LD_SEKDA_ASISTEN. "'"?>) * spcTitleAmount) + 
                        (parseInt(<?php echo "'" .REPRESENTASI_LD_BUPATI_WAKIL. "'"?>) * politicalTitleAmount);
                    
                }else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>){
                    totalUangRepresentatif = 
                        (parseInt(<?php echo "'" .REPRESENTASI_LP_SEKDA_ASISTEN. "'"?>) * spcTitleAmount) + 
                        (parseInt(<?php echo "'" .REPRESENTASI_LP_BUPATI_WAKIL. "'"?>) * politicalTitleAmount);
                }

                gebid('nominal-rep-all-container').value = totalUangRepresentatif;
                gebid('nominal-rep-all-terbilang-container').value = terbilang(totalUangRepresentatif);

            }

            /**
             * ANCHOR calculateSubTotalPenginapan
             * calculate total for each people
             */
            function calculateSubTotalPenginapan(amountOfPegawai){
                
                /**
                 * 1 == Setara
                 * 0 == Tidak Setara
                 */
                if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {

                    //('penginapan-biaya-per-malam-input').value dikalikan durasi-1 karena durasi menginap pasti durasi perjadin dikurangi 1
                    gebid('nominal-penginapan-all-container').value = parseInt(gebid('penginapan-biaya-per-malam-input').value) * (parseInt(document.getElementById('durasi-tanpa-hari-container').value)-1);

                } else {
                    var nominalTotalPenginapan = 0;

                    for (var index = 1; index <= amountOfPegawai; index++) {
                        nominalTotalPenginapan += parseInt(document.getElementById('penginapan-biaya-per-malam-input-'+index).value);
                    }

                    //nominalTotalPenginapan dikalikan durasi-1 karena durasi menginap pasti durasi perjadin dikurangi 1
                    gebid('nominal-penginapan-all-container').value = nominalTotalPenginapan  * (parseInt(document.getElementById('durasi-tanpa-hari-container').value)-1);;
                }
                
            }

            /**
             * SECTION calculateTotalExpense
             * function calculateTotalExpense()
             * what it does :
             *  calculate (total UH per person + total UT per person) x amount of person
             * 
             * param :
             *  @amountOfPegawai
             *      amount of pegawai that depart on perjadin
             * 
             *  @nominal-uh-all-container
             *      total UH per person
             * 
             *  @nominal-ut-all-container
             *      total UT per person
             * 
             * return :
             *  total expense stored inside nominal-grand-total-all-container
             */
            function calculateTotalExpense(amountOfPegawai){

                // Get value of totalUHPerPerson
                var grandTotalUH = gebid('nominal-uh-all-container').value * amountOfPegawai;

                // Get value of totalUangRepresenatif
                var grandTotalRep = parseInt(gebid('nominal-rep-all-container').value);

                // Variable for Uang Transport
                var grandTotalUT = '';
                
                // Variable for Whole Total
                var grandTotal = '';

                /** ANCHOR ISDD
                 * If type of Perjadin is DD, grandTotal only contain UH an UT
                 */
                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>) {

                    // For DD, all pegawai get Uang Transport
                    grandTotalUT = gebid('nominal-ut-all-container').value * amountOfPegawai;

                    // Count total and stored it inside container
                    grandTotal = grandTotalUH + grandTotalUT + grandTotalRep;

                } 
                /** ANCHOR ISLD
                 * If type of Perjadin is LD, grandTotal contain UH an UT with addition of Penginapan
                 */
                else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>) {

                    // For LD, only leader get the UT
                    grandTotalUT = parseInt(gebid('nominal-ut-all-container').value);
                    
                    // Variable for penginapan
                    var grandTotalPenginapan = 0;
                    /**
                     * 1 == Setara
                     * 0 == Tidak Setara
                     */
                    if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {
                        grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value) * amountOfPegawai;
                    }else{
                        grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value);
                    }
                    
                    // Count total and stored it inside container
                    grandTotal = grandTotalUH + grandTotalUT + grandTotalPenginapan;

                }
                /** SECTION ISLP
                 * If type of Perjadin is LP, grandTotal contain UH an UT with addition of Penginapan and Transport
                 */
                else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {
                    // If jenis transportasi untuk PP sama
                    if (gebid('jenis-transportasi-container').value == 1) {

                        // ANCHOR Mobil Pribadi
                        if (gebid('moda-transportasi-container').value == 1) {
                            // For LD, only leader get the UT
                            grandTotalUT = parseInt(gebid('nominal-ut-all-container').value);
                            // Variable for penginapan
                            var grandTotalPenginapan = 0;
                            /**
                             * 1 == Setara
                             * 0 == Tidak Setara
                             */
                            if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value) * amountOfPegawai;
                            }else{
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value);
                            }
                            
                            // Count total and stored it inside container
                            grandTotal = grandTotalUH + grandTotalUT + grandTotalPenginapan;

                        // ANCHOR Sewa Kendaraan
                        }else if (gebid('moda-transportasi-container').value == 2) {
                            // For LD, only leader get the UT
                            grandTotalUT = parseInt(gebid('nominal-ut-all-container').value);
                            // Variable for penginapan
                            var grandTotalPenginapan = 0;
                            /**
                             * 1 == Setara
                             * 0 == Tidak Setara
                             */
                            if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value) * amountOfPegawai;
                            }else{
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value);
                            }
                            
                            // Count total and stored it inside container
                            grandTotal = grandTotalUH + grandTotalUT + grandTotalPenginapan;
                        // ANCHOR Bus
                        }else if (gebid('moda-transportasi-container').value == 3) {
                            
                            grandTotalUT = parseInt(gebid('nominal-ut-all-container').value) * amountOfPegawai;
                            // Variable for penginapan
                            var grandTotalPenginapan = 0;
                            /**
                             * 1 == Setara
                             * 0 == Tidak Setara
                             */
                            if (getRadioButtonValue(biayaPenginapanInput, 'radio-biaya-penginapan') == 1) {
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value) * amountOfPegawai;
                            }else{
                                grandTotalPenginapan= parseInt(gebid('nominal-penginapan-all-container').value);
                            }
                            
                            // Count total and stored it inside container
                            grandTotal = grandTotalUH + grandTotalUT + grandTotalPenginapan;
                        }
                    }
                }
                // !SECTION

                gebid('nominal-grand-total-all-container').value = grandTotal;
                gebid('nominal-grand-total-all-terbilang-container').value = terbilang(grandTotal);
            }
            // !SECTION

            /**
             * ANCHOR startCalculations
             * function startCalculations
             * what it does : 
             *  run all function that calculate expense
             * 
             * param :
             *  @ $('.kota-tujuan-input').val().length
             *      length of selected tujuan
             * 
             *  @ $('.pegawai-input').val().length
             *      length of selected pegawai
             * 
             * return :
             *  total expense 
             */
            function startCalculations(amountOfPegawai){
                determineUH();
                calculateTotalUHPerPerson($('.kota-tujuan-input').val().length);
                calculateTotalUTPerPerson();
                calculateForSpecialTitle(amountOfPegawai);

                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?> || 
                    gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {

                    storePenginapanTidakSetaraDetails(amountOfPegawai);
                    calculateSubTotalPenginapan(amountOfPegawai);
                }

                calculateTotalExpense(amountOfPegawai);
            }
        // !SECTION
        // =========================================================================================
        // SECTION {FINAL CONFIRMATIONS} 
        // 

            // @ ALL FUNCTIONS BELOW ARE TESTED AND WORKED @
            /**
             * name checkboxvalue
             * what this does : 
             *      as parameter to be used in getCheckboxValue
             */
            var checkboxvalue = '';

            /**
             * ANCHOR getCheckboxValue
             * function getCheckboxValue(variable, radioButtonName)
             * what this does :
             *  this function used in checkbox onchange function to get the checkbox value and return it to variable
             * 
             * param : 
             *  @variable 
             *      describe what variable will store the returned value.
             * 
             *  @checkboxName 
             *      name of checkbox selected.
             * 
             * return :
             *  return the value of selected checkbox to a variable.
             */
            function getCheckboxValue(variable, checkboxName){
                return variable = document.querySelector('input[id='+checkboxName+']:checked').value;
            }

            /**
             * ANCHOR setFormAction
             */
            function setFormAction(){

                var form = document.getElementById('formPerjadinMain');
                var param = '';
                if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISDD . "'" ?>) {
                    param = <?php echo "'" . ISDD . "'" ?>;
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?>) {
                    param = <?php echo "'" . ISLD . "'" ?>;
                } else if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {
                    param = <?php echo "'" . ISLP . "'" ?>;
                }
                form.action = '<?= base_url(); ?>C_perjadin_main/generateDocuments/' + param;   
            }

            /**
             * ANCHOR startProcessing
             * function startProcessing()
             * what it does :
             *  this function is the processing point where all calculation is triggered
             * 
             * param :
             *  getCheckboxValue(checkboxvalue, 'flexCheckDefault')
             * 
             * return :
             *  start containPegawaiDetails() and calculateExpense() function
             */
            function startProcessing() {

                setFormAction();
                            
                if (getCheckboxValue(checkboxvalue, 'flexCheckDefault') == 1) {
                    // inputBecameReadOnly(true);
                    containPegawaiDetails();

                    if (gebid('type-of-perjadin-container').value == <?php echo "'" . ISLD . "'" ?> || gebid('type-of-perjadin-container').value == <?php echo "'" . ISLP . "'" ?>) {
                        storePenginapanTidakSetaraDetails($('.pegawai-input').val().length);
                    }
                    
                    startCalculations($('.pegawai-input').val().length);
                } else {
                    // inputBecameReadOnly(false);
                }
            };

        // !SECTION
        
    </script>