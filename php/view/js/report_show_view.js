$(function(){
		$("#comment-btn").click(function () {
			alert('aaa');
			var form = $(this).get(0);
		    var formData = new FormData(form);
		$.ajax({
		      url: 'MainContoller.php?mode=comment_add',
		      type:'POST',
		      dataType: 'jsonp',
		      data : formData,
		      success: function(data) {
		              alert("ok");
		      },
		      error: function(XMLHttpRequest, textStatus, errorThrown) {
		              alert("err");
		      }
		    });
		});
//		
//		
//		// 操作対象のフォーム要素を取得
//        var $form = $('#comment');
//        // 送信
//        $.ajax({
//            url: $form.attr('action'),
//            type: $form.attr('method'),
//            data: $form.serialize()
//                + '&delay=1',  // （デモ用に入力値をちょいと操作します）
//            timeout: 10000,  // 単位はミリ秒
//            
//            // 送信前
//            beforeSend: function(xhr, settings) {
//                // ボタンを無効化し、二重送信を防止
//                $button.attr('disabled', true);
//            },
//            // 応答後
//            complete: function(xhr, textStatus) {
//                // ボタンを有効化し、再送信を許可
//                $button.attr('disabled', false);
//            },
//            
//            // 通信成功時の処理
//            success: function(result, textStatus, xhr) {
//                // 入力値を初期化
//                $form[0].reset();
//                
//                $('#result').text('OK');
//            },
//            
//            // 通信失敗時の処理
//            error: function(xhr, textStatus, error) {}
//        });
//    });
	
});


