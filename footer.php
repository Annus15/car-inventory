<?php

?>
</div>
</div>
<script>
    $(document).ready(function(){
        var make_id = '';
        var model_id = '';
    $('.stock_make').on('change', function(){
            make_id = $(this).val();
            getModel(make_id);
        });
        $('.stock_model').on('change', function(){
            model_id = $(this).val();
            getTrim(model_id);
        });     
    });   
    function getModel(make_id, model_id = '', selected = ''){
            $.ajax({
                url: 'scripts.php',
                method: 'POST',
                data: {make_id : make_id},
                dataType: "html",

                success : function(_return)
                    {
                        var res = JSON.parse(_return);
                        var model_drop = '<option value="">Select Model</option>';
                        if(res != ''){
                            for(var i=0; i<res.length; i++){
                                if(model_id != ''){
                                    if(res[i].id == model_id){
                                        selected = 'selected';
                                    }
                                    else{
                                        selected = '';
                                    }
                                }
                                model_drop+= '<option value="'+res[i].id+'"'+selected+'>'+res[i].model_title+'</option>';
                            }
                        }
                        else{
                            model_drop += '<option disabled>No Records Found</option>';
                        }
                        $('.stock_model').html(model_drop);
                    }
            });
            return 1;
        }

        function getTrim(model_id, trim_id = '', selected = ''){
            $.ajax({
                url: 'scripts.php',
                method: 'POST',
                data: {model_id : model_id},
                dataType: "html",

                success : function(_return)
                    {
                        var res = JSON.parse(_return);
                        var trim_drop = '<option value="">Select Trim</option>';
                        if(res != ''){
                            for(var i=0; i<res.length; i++){
                                if(model_id != ''){
                                    if(res[i].id == trim_id){
                                        selected = 'selected';
                                    }
                                    else{
                                        selected = '';
                                    }
                                }
                                trim_drop+= '<option value="'+res[i].id+'"'+selected+'>'+res[i].trim_title+'</option>';
                            }
                        }
                        else{
                            trim_drop += '<option disabled>No Records Found</option>';
                        }
                        $('.stock_trim').html(trim_drop);
                    }
            });
        }

</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>