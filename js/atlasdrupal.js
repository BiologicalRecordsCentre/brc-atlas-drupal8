(function ($, Drupal, drupalSettings) {

  $(document).ready(function () {
    d3.selectAll('.atlasdrupal').each(function(){
      var id = d3.select(this).attr('id')

      if (!id) {
        console.error("You must specify a unique id attribute for elements of class atlasdrupal.")
      } else {
        var atlasconfig = d3.select(this).attr('data-atlasconfig')
        var mapid="atlas-map-"+id
        var sel="#"+id
        atlasconfigs[atlasconfig](sel, mapid)
      }
    })
  })
})(jQuery, Drupal, drupalSettings);