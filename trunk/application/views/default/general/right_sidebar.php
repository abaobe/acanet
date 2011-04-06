<!-- B.3 SUBCONTENT -->
                <div class="main-subcontent">

                   <?php
                        if(isset($sidebars)){
                            foreach ($sidebars as $i){
                                $this->load->view($this->page->theme . 'general/right_sidebarWrapper' ,
                                        array('title' => $i[0],
                                            'file' => $i[1]));
                            }
                        }else{
                            if(isset($html))
                                echo $html;
                        }
                    ?>

                </div>
            </div>
