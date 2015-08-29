(function() {
  var App = function(el, projects) {
    this.el = el;
    
    this.projectListing = new ProjectListing($('.gallery', this.el),projects);
    this.filterList     = new FilterList($('.filter-list', this.el),projects);
    this.displayer      = new Displayer($('.displayer', this.el))

    this.el.on('filter', this.onFilter.bind(this));
  }
  App.prototype.onFilter = function(event, selected) {
    this.projectListing.filter(selected);
  }
  $(function(){
    var app = new App($('.portofolio'),projects);
  })
}());