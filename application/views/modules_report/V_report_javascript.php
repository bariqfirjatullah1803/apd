<script>

    // =========================================================================================
    // ANCHOR { RADIO BUTTON RELATED FUNCTION }
    // 

        /**
         * name isReport
         * what this does : 
         *      as parameter to be used in isReport
         */
        var isReport = "";

        /**
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
         * function isReport()
         */
        function isReportOrAdvice(){

            // store value of radio button to container
            document.getElementById('bug-or-advice-container').value = getRadioButtonValue(isReport, 'radio-bug-or-advice');
        }
</script>