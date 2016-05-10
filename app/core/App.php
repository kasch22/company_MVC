<?php

class App
{

    protected $controller = 'Home';

    protected $method = 'index';

    protected $params = [];

    public $db;

    public function __construct()
    {

       $url = $this->parseURL();
       $checker = new Check();


        if(count($url) == 0)
        {

            Controller::req($this->controller);
            $this->controller = new $this->controller;
            Controller::call($this->controller, $this->method, $this->params);

        } else if(count($url) == 1) // if the URL has 1 value
                {

                    if ($checker->checkController($url[0]))
                    {
                        $this->controller = $url[0];
                        unset($url[0]);
                    }else
                        {
                            $this->controller = 'Error404';
                            unset($url[0]);
                        }

                    Controller::req($this->controller);
                    $this->controller = new $this->controller;
                    Controller::call($this->controller, $this->method, $this->params);

                } else if(isset($url[1]) && isset($url[2]))
                    {
                        // if the 2nd and 3rd (method and argument) URL is set


                        if ($checker->checkController($url[0]))
                        {
                            $this->controller = $url[0];
                            unset($url[0]);
                        } else
                            {
                                $this->controller = 'Error404';
                                unset($url[0]);
                            }


                        Controller::req($this->controller);
                        $this->controller = new $this->controller;


                        if ($checker->checkMethod($this->controller, $url[1])) {
                            $this->method = $url[1];
                            unset($url[1]);
                        } else
                            {
                                    $this->controller = 'Error404';
                                    unset($url[0]);
                            }


                        array_push($this->params, $url[2]);
                        Controller::call($this->controller, $this->method, $this->params);

                    } else if(isset($url[1]) && empty($url[2]))
                            {
                                // This calls a method in a controller with no Params

                                $url[2] = '';

                                if (file_exists('../app/controllers/' . $url[0] . '.php'))
                                {
                                    $this->controller = $url[0];
                                    unset($url[0]);

                                    Controller::req($this->controller);
                                    $this->controller = new $this->controller;

                                } else
                                    {
                                        $this->controller = 'Error404';
                                        unset($url[0]);

                                        Controller::req($this->controller);
                                        $this->controller = new $this->controller;

                                    }


                                if ($checker->checkMethod($this->controller, $url[1]))
                                {

                                    $this->method = $url[1];
                                    unset($url[1]);

                                } else
                                    {
                                        $this->controller = 'Error404';
                                        unset($url[0]);

                                        Controller::req($this->controller);
                                        $this->controller = new $this->controller;
                                    }

                                $this->params = []; //sets param to empty array as URL[2] has not been set
                                Controller::call($this->controller, $this->method, $this->params);

                            }
    }



    protected function parseUrl()
    {
        if(isset($_GET['url'])){

            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}