$("#prefecture_name").on('change', function(){
  var aVal = $(this).val();
  $.ajax({
    type: "POST",
    url: "function.php",
    data: { "prefecture_name" : aVal },
    dataType : "json"
  }).done(function(prefectures){
  //mapでoptionタグのオブジェクトを生成しておいて、ループの外でappendする
  var arr = $.map(prefectures, function (val, index){
    $option = $('', { value: index, text: val});
    return $option;
  });
  $('#city_name').append(arr);
  }).fail(function(XMLHttpRequest, textStatus, error){
    alert("エラーが発生しました。");
  });
});
