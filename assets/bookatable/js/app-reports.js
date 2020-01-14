$(document).ready(function () {
  generalReport(base_url+'reports/general_report/'+today, 'Hoy');
  $( "#report-today" ).click(function() {
    generalReport(base_url+'reports/general_report/'+today, 'Hoy');
  });

  $( "#report-yesterday" ).click(function() {
    generalReport(base_url+'reports/general_report/'+yesterday, 'Ayer');
  });

  $( "#report-last-7-days" ).click(function() {
    generalReport(base_url+'reports/general_report/'+today+'/'+last_7_days, 'Últimos 7 días');
  });

   $( "#report-last-28-days" ).click(function() {
    generalReport(base_url+'reports/general_report/'+today+'/'+last_28_days, 'Últimos 28 días');
  });
   
  promoReport(base_url+'reports/promo_report/'+today, 'Hoy');
  $( "#promo-today" ).click(function() {
    $("#table-promo").remove();
    promoReport(base_url+'reports/promo_report/'+today, 'Hoy');

  });
  $( "#promo-yesterday" ).click(function() {
    $("#table-promo").remove();
    promoReport(base_url+'reports/promo_report/'+yesterday, 'Ayer');
  });

  $( "#promo-last-7-days" ).click(function() {
    $("#table-promo").remove();
    promoReport(base_url+'reports/promo_report/'+today+'/'+last_7_days, 'Últimos 7 días');
  });

   $( "#promo-last-28-days" ).click(function() {
    $("#table-promo").remove();
    promoReport(base_url+'reports/promo_report/'+today+'/'+last_28_days, 'Últimos 28 días');
  });

  menuReport(base_url+'reports/menu_report/'+today, 'Hoy');
  $( "#menu-today" ).click(function() {
    $("#table-menu").remove();
    menuReport(base_url+'reports/menu_report/'+today, 'Hoy');

  });
  $( "#menu-yesterday" ).click(function() {
    $("#table-menu").remove();
    menuReport(base_url+'reports/menu_report/'+yesterday, 'Ayer');
  });

  $( "#menu-last-7-days" ).click(function() {
    $("#table-menu").remove();
    menuReport(base_url+'reports/menu_report/'+today+'/'+last_7_days, 'Últimos 7 días');
  });

   $( "#menu-last-28-days" ).click(function() {
    $("#table-menu").remove();
    menuReport(base_url+'reports/menu_report/'+today+'/'+last_28_days, 'Últimos 28 días');
  });

  userReport(base_url+'reports/user_report/'+today, 'Hoy');
  $( "#user-today" ).click(function() {
    $("#table-user").remove();
    userReport(base_url+'reports/user_report/'+today, 'Hoy');

  });
  $( "#user-yesterday" ).click(function() {
    $("#table-user").remove();
    userReport(base_url+'reports/user_report/'+yesterday, 'Ayer');
  });

  $( "#user-last-7-days" ).click(function() {
    $("#table-user").remove();
    userReport(base_url+'reports/user_report/'+today+'/'+last_7_days, 'Últimos 7 días');
  });

  $( "#user-last-28-days" ).click(function() {
    $("#table-user").remove();
    userReport(base_url+'reports/user_report/'+today+'/'+last_28_days, 'Últimos 28 días');
  });

  function generalReport(url, text) {
      $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              data = JSON.parse(data);
              $('.user-count strong').text(data.users);
              $('.menu-count strong').text(data.menus);
              $('.promo-count strong').text(data.promos);
              $('.report-date-title').text(text);
              console.log(data.users);
              console.log(data.menus);
              console.log(data.promos);
          }
      })
  }

  function promoReport(url, text) {
      $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              data = JSON.parse(data);
              console.log(data);
              promoTable(data, text);
          }
      })
  }

  function menuReport(url, text) {
      $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              data = JSON.parse(data);
              console.log(data);
              menuTable(data, text);
          }
      })
  }

  function userReport(url, text) {
      $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              data = JSON.parse(data);
              console.log(data);
              userTable(data, text);
          }
      })
  }

  function promoTable(data, text){
      var objeto = data;
      var table = $("<table/>").attr("id","table-promo").addClass( "table align-items-center table-flush" );
      $("#promo_component").append(table);

      var thead = "<thead><tr>";
      var thNombre = "<th>Nombre</th>";
      var thDate = "<th>"+text+"</th>";
      var theadEnd = "</tr></thead>"

      $("#table-promo").append(thead+thNombre+thDate+theadEnd);

      for(var i=0;i<objeto.length;i++)
      {
          var tr="<tr>";
          var td1="<td>"+objeto[i]["title"]+"</td>";
          var td2="<td>"+objeto[i]["Total"]+"</td></tr>";
          
         $("#table-promo").append(tr+td1+td2); 
        
      }
  }

  function menuTable(data, text){
      var objeto = data;
      var table = $("<table/>").attr("id","table-menu").addClass( "table align-items-center table-flush" );
      $("#menu_component").append(table);

      var thead = "<thead><tr>";
      var thNombre = "<th>Nombre</th>";
      var thDate = "<th>"+text+"</th>";
      var theadEnd = "</tr></thead>"

      $("#table-menu").append(thead+thNombre+thDate+theadEnd);

      for(var i=0;i<objeto.length;i++)
      {
          var tr="<tr>";
          var td1="<td>"+objeto[i]["title"]+"</td>";
          var td2="<td>"+objeto[i]["Total"]+"</td></tr>";
          
         $("#table-menu").append(tr+td1+td2); 
        
      }
  }
  function userTable(data, text){
      var objeto = data;
      var table = $("<table/>").attr("id","table-user").addClass( "table align-items-center table-flush" );
      $("#user_component").append(table);

      var thead = "<thead><tr>";
      var thNombre = "<th>Nombre</th>";
      var thDate = "<th>"+text+"</th>";
      var theadEnd = "</tr></thead>"

      $("#table-user").append(thead+thNombre+thDate+theadEnd);

      for(var i=0;i<objeto.length;i++)
      {
          var tr="<tr>";
          var td1="<td>"+objeto[i]["first_name"]+"</td>";
          var td2="<td>"+objeto[i]["Total"]+"</td></tr>";
          
         $("#table-user").append(tr+td1+td2); 
        
      }
  }

});
