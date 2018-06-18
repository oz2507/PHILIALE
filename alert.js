document.querySelector('button.confirm').onclick = function(){
        swal({
            title:"寄贈しますか?", // タイトル文
            text:"Your will not be able to recover this imaginary file!", //説明文
            type:"warning", // default:null "warning","error","success","info"
            allowOutsideClick:false, // default:false アラートの外を画面クリックでアラート削除
            showCancelButton: true, // default:false キャンセルボタンの有無
            confirmButtonText:"オッケー", // default:"OK" 確認ボタンの文言
            confirmButtonColor: "#DD6B55", // default:"#AEDEF4" 確認ボタンの色
            cancelButtonText:"キャンセル", // キャンセルボタンの文言
            closeOnConfirm: false // default:true 確認ボタンを押したらアラートが削除される
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            }
        );
    };