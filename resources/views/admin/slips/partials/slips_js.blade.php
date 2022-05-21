<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
<script>
    $(function(){
        $( document ).on("click change paste keyup", ".calcEvent", function() {
            calcTotals();
        });
    $(document).on('click', '.delete_row', function(){
          $(this).parents('tr').remove();
          calcTotals();
      });
     
    // $( document ).on('click', '.deleteItem', function() {
       
    //         // var $this = $(this);
    //         BootstrapDialog.show({
    //             message: 'Confirmation',
    //         //     message: 'confirmation',
    //             // buttons: [ {
    //             //     icon: 'fa fa-check',
    //             //     label: ' Yes',
    //             //     cssClass: 'btn-success btn-xs',
    //                 // action: function(dialogItself){
    //                 //     $.post("{{url('slips/deleteItem') }}", { "_token": "{{ csrf_token() }}", id : $this.attr('data-id') } , 'json').done(function(data){
    //                 //         $this.parents('tr').remove();
    //                 //         //calcTotals();
    //                 //     }).fail(function(jqXhr, json, errorThrown){
    //                 //     }).always(function(){
    //                 //         dialogItself.close();
    //                 //     });
    //                 // }
    //             // }, {
    //             //     icon: 'fa fa-remove',
    //             //     label: 'No',
    //             //     cssClass: 'btn-danger btn-xs',
    //             //     action: function(dialogItself){
    //             //         dialogItself.close();
    //             //     }
    //             // }]
    //        });
    //     });
    });
    function toggleDelete(id) {
        document.getElementById('item_id').value = id;
        document.getElementById('exampleModal').style.display = '';
    }

            function deleteProject()
            {
                let id = document.getElementById('item_id').value;
                axios.get('{{url('admin/slips/deleteItem/')}}'+'/'+id , {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    })
                    
                    .then(function(response) {
                        console.log("no errors");
                        window.location.replace("{{url('admin/slips') }}");
                    })
                    .catch(function(error) {
                        console.log(error);

                    });

            }
    $('#slip_form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                $('.slip').addClass('spinner');
                $('.slip .alert-danger').remove();
                var $form = $('#slip_form');
                var data = $('#slip_form input, span,select,textarea').not('#description,#reference_item,#unit,#unit_price,#qte_min,#qte_max,#total_price_min,#total_price_max').serializeArray();
                var items = [];
                var item_order = 1;
                $('table tr.item').each(function() {
                    var row = {};
                    $(this).find('input,span,select,textarea').each(function() {
                        if($(this).attr('name')) row[$(this).attr('name')] = $(this).val();
                    });
                    items.push(row);
                });
                data.push({name : 'items', value: JSON.stringify(items)});
                $.post($form.attr('action'), data , 'json').done(function(data){
                    if(data.errors){
                        return;
                    }
                    if(data.redirectTo){
                        window.location = data.redirectTo;
                    }else {
                        window.location.replace("{{url('admin/slips') }}");
                    }
                    // Refresh page, or redirect if url has been passed
                })
                .fail(function(jqXhr, json, errorThrown){
                    var errors = jqXhr.responseJSON;
                    var errorStr = '';
                    $.each( errors, function( key, value ) {
                        $('#'+key).parents('.form-group').addClass('has-error');
                        $('.'+key).parents('.form-group').addClass('has-error');
                        errorStr += '- ' + value[0] + '<br/>';
                    });
                    var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
                    $('.slip').prepend(errorsHtml);
                }).always(function(){
                    $('.slip').removeClass('spinner');
                });
                return false;
            }
        });
   
   
   
    $(document).on('click', '.btn_add_row', function()
     {
        cloneRow('item_table');
     });
     function calcTotals(){
            
            $('tr.item').each(function(){
                var qte_min    = parseFloat($(this).find("[name='qte_min']").val());
                var qte_max    = parseFloat($(this).find("[name='qte_max']").val());
                var unit_price        = parseFloat($(this).find("[name='unit_price']").val());
                var total_price_min   = parseFloat(qte_min * unit_price) > 0 ? parseFloat(qte_min * unit_price) : 0;
                var total_price_max   = parseFloat(qte_max * unit_price) > 0 ? parseFloat(qte_max * unit_price) : 0;
               
                $(this).find("#total_price_min").val( total_price_min.toFixed(2) );
                $(this).find("#total_price_max").val( total_price_max.toFixed(2) );
            });
          
    }
     var count = "1";
    function cloneRow(in_tbl_name)
    {
            var tbody = document.getElementById(in_tbl_name).getElementsByTagName("tbody")[0];
            // create row
            var row = document.createElement("tr");
            // create table cell 1
            var td1 = document.createElement("td");
            var strHtml1 = '<span class="btn btn-danger btn-xs delete_row"><i class="fa fa-minus"></i><input type="hidden" name="item_id" id="item_id" value=""></span>';
            td1.innerHTML = strHtml1.replace(/!count!/g,count);
            //add cell ref
            var td_ref = document.createElement("td");
            var strHtml_2 = '<div class="form-group"><input class="form-control" type="text" name="reference_item" id="reference_item" value=""></div>';
            td_ref.innerHTML = strHtml_2.replace(/!count!/g,count);
         //   create table cell 2
            var td2 = document.createElement("td");
            var strHtml2 = '<div class="form-group"><textarea class="form-control" rows="1" type="text" name="description" id="description" value="" style="resize: vertical; text-transform: capitalize;"></textarea></div>';
             td2.innerHTML = strHtml2.replace(/!count!/g,count);

             var td3 = document.createElement("td");
            var strHtml3 = '<div class="form-group"><select class="form-control" name="unit" id="unit"> <option value disabled {{ old('unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>@foreach(App\Models\SlipItem::UNIT_SELECT as $key => $label)  <option value="{{ $key }}" {{ old('unit', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>   @endforeach</select></div>';
             td3.innerHTML = strHtml3.replace(/!count!/g,count);

             var td4 = document.createElement("td");
            var strHtml4 = '<div class="form-group"><input class="form-control calcEvent" type="text" name="qte_min" id="qte_min" value=""></div>';
             td4.innerHTML = strHtml4.replace(/!count!/g,count);

             var td5 = document.createElement("td");
            var strHtml5 = '<div class="form-group"><input class="form-control calcEvent" type="text" name="qte_max" id="qte_max" value=""></div>';
             td5.innerHTML = strHtml5.replace(/!count!/g,count);

             var td6 = document.createElement("td");
            var strHtml6 = '<div class="form-group"><input class="form-control calcEvent" type="text" name="unit_price" id="unit_price" value=""></div>';
             td6.innerHTML = strHtml6.replace(/!count!/g,count);

             var td7 = document.createElement("td");
            var strHtml7 = '<div class="form-group"><input type="text" class="form-control" name="total_price_min" id="total_price_min" disabled value="0.00"></div>';
             td7.innerHTML = strHtml7.replace(/!count!/g,count);

             var td8 = document.createElement("td");
            var strHtml8 = '<div class="form-group"><input type="text" class="form-control" name="total_price_max" id="total_price_max" disabled value="0.00"> </div>';
             td8.innerHTML = strHtml8.replace(/!count!/g,count);
            // append data to row
            row.appendChild(td1);
            row.appendChild(td_ref);
            row.appendChild(td2);
            row.appendChild(td3);
            row.appendChild(td4);
            row.appendChild(td5);
            row.appendChild(td6);
            row.appendChild(td7);
            row.appendChild(td8);
           // add to count variable
            count = parseInt(count) + 1;
            // append row to table
            tbody.appendChild(row);
            row.className = 'item';
           // $('tr.item:last select').chosen({width:'100%'});
    }


    </script>