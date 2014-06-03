$(function(){
	$("#comment-btn").click(function () {
		var form, fd;
	    form = $('#comment');
	    fd = new FormData(form[0]);
	    $.ajax(form.attr("action"), {
	      type: 'post',
	      processData: false,
	      contentType: false,
	      data: fd,
	      dataType: 'html',
	      success: function(){
	    	  // コメントの表示
	    	  commentShow();
	      },
	      error: function() {
	        alert('ajax error');
	      }
	    });
	});
	
	function commentShow () {
		$(function(){
			var form, fd;
		    form = $('#comment-show');
		    fd = new FormData(form[0]);
			$.ajax(form.attr("action"), {
			      type: 'post',
			      processData: false,
			      contentType: false,
			      data: fd,
			      dataType: 'html',
			      success: function(data){
			    	  console.dir(JSON.parse(data)['comment']);
			    	  var commentHtml = "";
			    	  $.each(JSON.parse(data)['comment'], function(i, item) {
			    		  commentHtml += "<div class='comment-row'>"+
			              				   item.body + "<br \>" +
			              				   item.comment_date + "<br />" +
			              				"</div>";
			          });
			    	  $('#xmlObj').empty().html(commentHtml);
    			      $('#input-comment').val('');
			      },
			      error: function() {
			        alert('ajax show error');
			      }
			});
	    });
	}
	
	commentShow();
	
});
