<script>
  let open = true;
  function toggleSidebar() {
    open = !open;
    document.getElementById('sidebar').classList.toggle('collapsed', !open);
    document.getElementById('main').classList.toggle('expanded', !open);
  }
</script>