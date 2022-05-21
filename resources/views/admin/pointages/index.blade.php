@extends('layouts.admin')
<style>
    
    .title{
        font-family: "Times New Roman";
        display: flex;
        margin-top: 10px;
        color: black;
        font-size: 25px;
        font-weight:bold;
    }
    #sitename{
        margin-left: 30%;
    }
    #demo{
        font-family: "Times New Roman";
        color: black;
        margin-top: -30px;
        float: right;
         font-weight:700;
         font-size: 120%;
    }
    
    #modifierdate{
        margin-top: -80px;
        float: left;
        margin-left: 80%;
    }
    #modate{
        color: black;

    }
    #moodate{
         width:40%;
         
    }
    #ulp{
        list-style-type: none;
        margin-left: -10px;
        margin-right: 10px;
    }
    #ilp{
        color :#f8f9fa !important;
        display: inline-block;
    }
    #selecto{

        font-size: 12px;
        margin-top: 50px;
        margin-left: 20px;
    }
    #valide{

        margin-top: 50px;
        margin-left: 45%;
    }
    #aprove{

        margin-top: 50px;
        margin-left: 45%;
    }

    input[type="checkbox"][id^="myCheckbox"] {
        display: none;
    }

    #labelp {

        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
    }

    label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    label img {
        height: 150px;
        width: 150px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked + label {
        border-color: #ddd;
    }
    input:checked + label {
        background-color: green;
    }

    input:not(:checked) + label {
        background-color: red;
    }


    :checked + label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: -1;
    }
    :checked + label:before {

        background-color: green;

    }

    :not(:checked) + label:before {

        background-color: red;

    }
    .img:active{
        transform: scale(1.50);
        box-shadow: 0 20px 30px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }
    .ip{
        border: 2px solid #DA70D6;
    }
    #nombre{
        float: right;
        margin-top: -10px;
        font-weight:600;

    }


</style>
@section('content')
<body style="background-image: url(https://agrinova.ma/wp-content/uploads/2020/01/Background-website-01.jpg); ">


<div class="container_fluid">

            <!-- pointage title -->
            <div class="title">
            <p id="POINTAGE">POINTAGE</p>
            <p id="sitename">Chantier 12</p>
            </div>
            <!-- date -->
            <p id="demo"></p>
            <!-- date modifiable-->
             <div id="modifierdate" class="form-group col-md-6">
                <label id="modate" for="modifierdate">Choisir votre date :</label>
                <input class="form-control date" type="text"  id="moodate">
            </div>
            <!-- select button -->
            <button id="selector" type="button"  class="btn btn-dark"  style="    color: #fff !important;
            background-color:  #2eaacc !important;
            border-color:  #2eaacc !important;">Tout sélectionner</button>
            <!-- deselect button -->
            <button id="deselector" type="button"  class="btn btn-dark" style="color: #fff !important;
            background-color: #2eaacc78  !important;
            border-color: #2eaacc78  !important;" >Tout désélectionner </button>
            <!-- Modifier button -->
            <button type="button" id="modifer" class="btn btn-info">Modifier</button>
                <!-- nombre -->
    <div id="nombre" class="text-uppercase" style="
    color: black;">
        <div>
            le nombre total : <span id="totalCheckboxes">0</span>
        </div>
        <div>
            le nombre de present : <span id="numberOfChecked">0</span>
        </div>
        <div>
            le nombre d'absent : <span id="numberNotChecked">0</span>
        </div>
    </div>
            <!-- line -->
            <hr>
                <div class="card" style="background-color: transparent;
                                         border-color: transparent;">
    <div class="card_body">
        <style >



</style>

            <ul  id="ulp">
                @foreach ($employes as $employe)
        <li  id="ilp">

            <input style="display: none;   " type="checkbox"  id="{{ $employe->id }}" name="{{ $employe->first_name }}" class="myCheckbox"/>
            <label id="labelp" ><center style="font-size: large;color: black"> {{ $employe->first_name }}-{{ $employe->last_name }}</center> </label>
                <label class="ip" id="labelp" for="{{ $employe->id }}">
                <img class="img" src="https://media.istockphoto.com/vectors/builder-avatar-icon-profession-logo-male-character-a-man-in-clothes-vector-id1126790945"/>
                </label>

        </li>
                @endforeach
                </ul>

    </div>
 </div>
    

                <!-- valide button -->
                <button type="submit" name="submit" value="submit" id="valide" class="btn btn-success">Validé</button>
                <!-- aprove button -->
                <button type="submit" name="submit" value="submit" id="aprove" class="btn btn-success">Aprové</button>
            </div>
            <script>
                //array present and array absent
                $(document).ready(function(){
                    var arraypresent = [];
                    var arrayabsent =[] ;
                    $("#valide").click(function(){
                        $("input.myCheckbox:checkbox:checked").each(function(){
                            arraypresent.push($(this).attr('id'));
                        });
                        console.log(arraypresent);
                        $("input.myCheckbox:checkbox:not(:checked)").each(function(){
                            arrayabsent.push($(this).attr('id'));
                        });
                        console.log(arrayabsent);

                    })
                });
                // check number
                $(document).ready(function(){
                    var $checkboxes = $('.myCheckbox[type="checkbox"]');
                    // number of present
                    $checkboxes.ready(function(){
                        var numberOfChecked = $('input:checkbox:checked').length;
                        $('#numberOfChecked').text(numberOfChecked);
                        $('#numberOfChecked').val(numberOfChecked);
                    });
                    $checkboxes.change(function(){
                        var numberOfChecked = $('input:checkbox:checked').length;
                        $('#numberOfChecked').text(numberOfChecked);
                        $('#numberOfChecked').val(numberOfChecked);
                    });
                    // numbeer total
                    $checkboxes.ready(function(){
                        var totalCheckboxes = $('input:checkbox').length;
                        $('#totalCheckboxes').text(totalCheckboxes);
                        $('#totalCheckboxes').val(totalCheckboxes);
                    });
                    // number of absent
                    $checkboxes.ready(function(){
                        var numberNotChecked = $('input:checkbox:not(":checked")').length;
                        $('#numberNotChecked').text(numberNotChecked);
                        $('#numberNotChecked').val(numberNotChecked);
                    });
                    $checkboxes.change(function(){
                        var numberNotChecked = $('input:checkbox:not(":checked")').length;
                        $('#numberNotChecked').text(numberNotChecked);
                        $('#numberNotChecked').val(numberNotChecked);
                    });
                    // number of present when select all
                    $(document).ready(function(){
                        $("#selector").click(function(){
                            
                            var numberOfChecked = $('input:checkbox:checked').length;
                        $('#numberOfChecked').text(numberOfChecked);
                        $('#numberOfChecked').val(numberOfChecked);
                            var numberNotChecked = $('input:checkbox:not(":checked")').length;
                        $('#numberNotChecked').text(numberNotChecked);
                        $('#numberNotChecked').val(numberNotChecked);
                        });

                    });
                    // number of present when deselect all
                    $(document).ready(function(){
                        $("#deselector").click(function(){

                            var numberOfChecked = $('input:checkbox:checked').length;
                        $('#numberOfChecked').text(numberOfChecked);
                        $('#numberOfChecked').val(numberOfChecked);
                            var numberNotChecked = $('input:checkbox:not(":checked")').length;
                        $('#numberNotChecked').text(numberNotChecked);
                        $('#numberNotChecked').val(numberNotChecked);
                        });

                    });
                    

                });
                // Date
                    $(document).ready(function(){
                            var date = new Date();
                            var options = {weekday: "long", month: "long", day: "2-digit"};
                         document.getElementById("demo").innerHTML = date.toLocaleDateString("fr-FR", options);
                      });
                    // select all
                    $(document).ready(function(){
                        $("#selector").click(function(){
                            $(".myCheckbox").prop('checked',true);
                        });
                    });
                    // deselect all
                    $(document).ready(function(){
                        $("#deselector").click(function(){
                            $(".myCheckbox").prop('checked',false);
                        });
                    });
                // hide date
                $(document).ready(function(){
                   $("#modifierdate").hide();
                });
                // hide valide
                $(document).ready(function(){
                   $("#aprove").hide();
                });
                // affiche date
                $(document).ready(function(){
                  $("#modifer").click(function(){
                    $("#demo").hide();
                    $("#modifierdate").show();
                    $("#valide").hide();
                    $("#aprove").show();
                    $("#nombre").css("margin-right", "68px");
                   });                              
                });

                </script>





            @endsection
            @section('scripts')
            @parent

            <script>
                $(function () {
              let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('employe_delete')
              let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
              let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.employes.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                  var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                      return entry.id
                  });

                  if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                  }

                  if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                      headers: {'x-csrf-token': _token},
                      method: 'POST',
                      url: config.url,
                      data: { ids: ids, _method: 'DELETE' }})
                      .done(function () { location.reload() })
                  }
                }
              }
              dtButtons.push(deleteButton)
            @endcan
            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.employes.index') }}",
                columns: [
                  { data: 'placeholder', name: 'placeholder' },
            { data: 'id', name: 'id' },
            { data: 'picture', name: 'picture', sortable: false, searchable: false },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'mobile', name: 'mobile' },
            { data: 'job_job_title', name: 'job.job_title' },
            { data: 'cin', name: 'cin' },
            { data: 'salary_type', name: 'salary_type' },
            { data: 'salary', name: 'salary' },
            { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 25,
              };
              let table = $('.datatable-Employe').DataTable(dtOverrideGlobals);
              $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                  $($.fn.dataTable.tables(true)).DataTable()
                      .columns.adjust();
              });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                  let strict = $(this).attr('strict') || false
                  let value = strict && this.value ? "^" + this.value + "$" : this.value

                  let index = $(this).parent().index()
                  if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                  }

                  table
                    .column(index)
                    .search(value, strict)
                    .draw()
              });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                  visibleColumnsIndexes = []
                  table.columns(":visible").every(function(colIdx) {
                      visibleColumnsIndexes.push(colIdx);
                  });
              })
            });

            </script>
</body>

            @endsection
