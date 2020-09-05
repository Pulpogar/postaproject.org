<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<script>
  $("#btnRoles").click(function(event) {
      document.getElementById("resultado").innerHTML = "";
      $("#resultado").load('manage.roles.php');
  });

  $("#btnAreas").click(function(event) {
        $("#resultado").load('manage.areas.php');
  });

  $("#btnUsers").click(function(event) {
        $("#resultado").load('manage.users.php');
  });

  $("#btnProjects").click(function(event) {
        $("#resultado").load('manage.projects.php');
  });

  $("#btnLogs").click(function(event) {
        $("#resultado").load('manage.logs.php');
  });

  $("#btnLanguages").click(function(event) {
        $("#resultado").load('manage.languages.php');
  });

  $("#btnSubscriptions").click(function(event) {
        $("#resultado").load('manage.subscriptions.php');
  });

  $("#btnNovelty").click(function(event) {
        $("#resultado").load('manage.novelty.php');
  });

  $("#btnStatistics").click(function(event) {
        $("#resultado").load('manage.statistics.php');
  });
</script>