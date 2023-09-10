<?php
/**
 * Router
 *
 */
class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];
    protected $params = [];
    /**
     * Add a route to the routing table
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params = [])
    {
        // $this->routes[$route] = $params;

           // Convert the route to a regular expression: escape forward slashes
           $route = preg_replace('/\//', '\\/', $route);

           // Convert variables e.g. {controller}
           $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
   
           // Convert variables with custom regular expressions e.g. {id:\d+}
           $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
   
           // Add start and end delimiters, and case insensitive flag
           $route = '/^' . $route . '$/i';
   
           $this->routes[$route] = $params;
    }

    //regular expression controller / action with capture groups
    ///^(?P<controller>[a-z]+)\/(?P<action>[a-z]+)$/

    public function match ($url) {
        // foreach ($this->routes as $route => $params){
        //     if($url == $route){
        //         $this->params = $params;
        //         return true;
        //     }
        // }
    //Match to the fixed URL format /controller/action 
    //$reg_exp = "/^(?P<controller>[a-z]+)\/(?P<action>[a-z]+)$/";
        foreach ($this->routes as $route => $params){
            if (preg_match($route, $url, $matches)) {
                //get named capture group values
                foreach ($matches as $key => $match){
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get current matched parameters
     *
     * @return array
     */
    public function getParams(){
        return $this->params;
    }
    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
