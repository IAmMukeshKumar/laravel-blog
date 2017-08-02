
<div class="col-md-9 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="piechart1" style="width: 500px; height: 400px;"></div>
            <div class="text-center">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(ApprovedUnapproved);

        function ApprovedUnapproved() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'This is chart'],
                ['Approved',{{ $postsCountPublic }}],
                ['Unapproved', {{ $postsCountDraft }}],
            ]);

            var options = {
                title: 'Posts'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }

    </script>