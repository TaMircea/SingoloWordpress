(function(){
 var Project = function(el, project) {
    this.project = project;
    this.displayed;
    this.el = $(this.template(project));
  }
  Project.prototype.template = function(data) {
    return '<a href="'+ data.link +' " class="project"'+'data-info="'+data.info +' " '+ ' data-category="'+ data.categories.join(' ')  +'">' +
        '<img src="'+ data.photo  +'" alt="Sample image"/>' +
        '</a>';
  }
  window.Project = Project
}());