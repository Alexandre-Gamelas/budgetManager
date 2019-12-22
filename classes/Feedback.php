<?php
##Code for feedback is action + bool, example, purchaseYes or purchaseNo
class Feedback
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
        $this->initialize();
    }

    private function initialize(){
        ?>
            <script>
                var type = '<?=$this->type?>';
                console.log(type);
                var title;
                var text;
                var icon;

                if(type.includes("Yes")){
                     title = "Success!";
                     icon = "<i class=\"fas fa-thumbs-up green fa-3x\"></i>";
                } else {
                    title = "Upsssss!";
                    text = "Something went wrong... please try again.";
                    icon = "<i class=\"fas fa-frown fa-3x text-danger\"></i>";
                }

                switch(type){
                    case 'purchaseYes':
                        text = "Your purchase was successfully registered!";
                        break;
                    case 'registerYes':
                        text = "Your were successfully registered!";
                        break;
                    case 'updateCatYes':
                        text = "Updated successfully!";
                        break
                    case 'newCatYes':
                        text = "New category registered!";
                        break;
                }

                $("#iconFeedback").html(icon);
                $("#textFeedback").html(text);
                $("#titleFeedback").html(title);
                $('#modalFeedback').modal('show');

            </script>
        <?php
    }
}