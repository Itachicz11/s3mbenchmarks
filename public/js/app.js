(function() {


}).call(this);

(function() {
  var drawChart;

  $.ajax({
    url: '/callrail/users_companies_data',
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      return google.setOnLoadCallback(drawChart(data));
    }
  });

  drawChart = function(chart_data) {
    var chart, data, options;
    data = new google.visualization.DataTable();
    data.addColumn("string", "User");
    data.addColumn("number", "Companies");
    data.addRows(chart_data);
    options = {
      width: "100%",
      height: 300
    };
    chart = new google.visualization.PieChart(document.getElementById("chart_div"));
    return chart.draw(data, options);
  };

  google.load("visualization", "1.0", {
    packages: ["corechart"]
  });

}).call(this);

//# sourceMappingURL=app.js.map