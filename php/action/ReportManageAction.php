<?php
require_once('../dao/ContentDao.php')

private $reportObj = new ContentDao();
private $post;
private $mode;

class ReportAction implements ActionInterface {
    
    public __construct($post) {
        $this->post = $post;
        $this->mode = $post['mode'];
    }
    
    /** 
     * @Override
     */
    public saveAction() {
            $this->reportObj->insert($this->post);
        }
    }
    
    /** 
     * @Override
     */
    public showAction() {
        $BEANS = $this->reportObj->select($this->post);
        swicth($mode) {
            case 'group_reports':
                require_once('../view/group_view.php.php');
                break;
            case 'individual_reports':
                require_once('../view/ndividual_view.php');
                break;
        }
    }
       
}

?>