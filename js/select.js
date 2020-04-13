    function select_selected(){
                var selected = $('select[name="select"]').val();
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {choosed: selected},
                    success: function(data){
                        if(selected=='Mass Delete Action'){
                            $('.checks').show();
                        }else {
                            $('.checks').hide();
                        }
                    }
                });
            };