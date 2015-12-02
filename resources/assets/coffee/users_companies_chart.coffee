
# Set a callback to run when the Google Visualization API is loaded.

$.ajax
  url: '/callrail/users_companies_data'
  type: "GET"
  dataType: "JSON"
  success: (data) ->
    google.setOnLoadCallback(drawChart(data))


# Callback that creates and populates a data table,
# instantiates the pie chart, passes in the data and
# draws it.
drawChart = (chart_data) ->

  # Create the data table.
  data = new google.visualization.DataTable()
  data.addColumn "string", "User"
  data.addColumn "number", "Companies"
  data.addRows chart_data

  # Set chart options
  options =
    width: "100%"
    height: 300


  # Instantiate and draw our chart, passing in some options.
  chart = new google.visualization.PieChart(document.getElementById("chart_div"))
  chart.draw data, options

google.load "visualization", "1.0",
  packages: [ "corechart" ]

