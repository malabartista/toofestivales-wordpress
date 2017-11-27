<?php
class A_Security_Factory extends Mixin
{
    public function wordpress_security_manager($context = FALSE)
    {
        return new C_WordPress_Security_Manager($context);
    }
    public function security_manager($context = FALSE)
    {
        return $this->object->wordpress_security_manager($context);
    }
    public function wordpress_security_actor($context = FALSE)
    {
        return new C_WordPress_Security_Actor($context);
    }
    public function wordpress_security_token($context = FALSE)
    {
        return new C_Wordpress_Security_Token($context);
    }
    public function security_token($context)
    {
        return $this->object->wordpress_security_token($context);
    }
}
class Mixin_Security_Actor extends Mixin
{
    public function add_capability($capability_name)
    {
        return false;
    }
    public function remove_capability($capability_name)
    {
        return false;
    }
    public function is_allowed($capability_name, $args = null)
    {
        return false;
    }
    public function is_user()
    {
        return false;
    }
}
class Mixin_Security_Actor_Entity extends Mixin
{
    public $entity_object = null;
    public $entity_props = null;
    // Note, an Actor with null $entity is considered a "Guest", i.e. no privileges
    public function set_entity($entity, $entity_props = null)
    {
        $this->object->entity_object = $entity;
        $this->object->entity_props = $entity_props;
    }
    public function get_entity($entity = null)
    {
        if ($entity == null) {
            $entity = $this->object->entity_object;
        }
        if ($entity != null && $entity == $this->object->entity_object) {
            return $entity;
        }
        return null;
    }
    public function get_entity_id($entity = null)
    {
        $entity = $this->object->get_entity($entity);
        if ($entity != null) {
            $entity_props = $this->object->entity_props;
            if (isset($entity_props['id'])) {
                return $entity_props['id'];
            }
        }
        return null;
    }
    public function get_entity_type($entity = null)
    {
        $entity = $this->object->get_entity($entity);
        if ($entity != null) {
            $entity_props = $this->object->entity_props;
            if (isset($entity_props['type'])) {
                return $entity_props['type'];
            }
        }
        return null;
    }
}
// XXX not used yet
class Mixin_Security_Entity_List extends Mixin
{
    public $_entity_list;
    public function add_entity($entity, $entity_props = null)
    {
        if (!$this->object->is_entity($entity)) {
            $entity_props = array_merge((array) $entity_props, array('object' => $entity));
            $this->object->_entity_list[] = $entity_props;
        }
    }
    public function remove_entity($entity)
    {
        if ($this->object->is_entity($entity)) {
        }
    }
    public function is_entity($entity)
    {
        return $this->object->get_entity_set($entity);
    }
    public function get_entity_set($entity)
    {
        foreach ($this->_entity_list as $entity_set) {
        }
    }
    public function get_entity_id($entity)
    {
    }
    public function get_entity_type($entity)
    {
    }
}
class C_Security_Actor extends C_Component
{
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->implement('I_Security_Actor');
        $this->add_mixin('Mixin_Security_Actor');
        $this->add_mixin('Mixin_Security_Actor_Entity');
    }
}
class Mixin_Security_Manager extends Mixin
{
    public function is_allowed($capability_name, $args = null)
    {
        $actor = $this->object->get_current_actor();
        if ($actor != null) {
            return $actor->is_allowed($capability_name, $args);
        }
        return false;
    }
    public function get_actor($actor_id, $actor_type = null, $args = null)
    {
        return null;
    }
    public function get_current_actor()
    {
        return null;
    }
}
class Mixin_Security_Manager_Request extends Mixin
{
    public function get_request_token($action_name, $args = null)
    {
        return null;
    }
}
class C_Security_Manager extends C_Component
{
    static $_instances = array();
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->implement('I_Security_Manager');
        $this->add_mixin('Mixin_Security_Manager');
        $this->add_mixin('Mixin_Security_Manager_Request');
    }
    static function get_instance($context = False)
    {
        if (!isset(self::$_instances[$context])) {
            self::$_instances[$context] = new C_Security_Manager($context);
        }
        return self::$_instances[$context];
    }
}
class Mixin_Security_Token extends Mixin
{
    public function get_request_list($args = null)
    {
        return array();
    }
    public function get_form_html($args = null)
    {
        return null;
    }
    public function check_request($request_values)
    {
        return false;
    }
    public function check_current_request()
    {
        return $this->object->check_request($_REQUEST);
    }
}
class Mixin_Security_Token_Property extends Mixin
{
    public $_action_name;
    public $_args;
    public function init_token($action_name, $args = null)
    {
        $this->object->_action_name = $action_name;
        $this->object->_args = $args;
    }
    public function get_action_name()
    {
        return $this->object->_action_name;
    }
    public function get_property($name)
    {
        if (isset($this->object->_args[$name])) {
            return $this->object->_args[$name];
        }
        return null;
    }
    public function get_property_list()
    {
        return array_keys((array) $this->object->_args);
    }
}
class C_Security_Token extends C_Component
{
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->implement('I_Security_Token');
        $this->add_mixin('Mixin_Security_Token');
        $this->add_mixin('Mixin_Security_Token_Property');
    }
}
class Mixin_WordPress_Security_Actor extends Mixin
{
    public function add_capability($capability_name)
    {
        $entity = $this->object->get_entity();
        if ($entity != null) {
            $capability_name = $this->object->get_native_action($capability_name);
            $entity->add_cap($capability_name);
            return true;
        }
        return false;
    }
    public function remove_capability($capability_name)
    {
        $entity = $this->object->get_entity();
        if ($entity != null && $this->object->is_allowed($capability_name)) {
            $capability_name = $this->object->get_native_action($capability_name);
            $entity->remove_cap($capability_name);
            return true;
        }
        return false;
    }
    public function is_allowed($capability_name, $args = null)
    {
        $entity = $this->object->get_entity();
        if ($entity != null) {
            $capability_name = $this->object->get_native_action($capability_name, $args);
            return $entity->has_cap($capability_name);
        }
        return false;
    }
    public function is_user()
    {
        return $this->object->get_entity_type() == 'user';
    }
    public function get_native_action($capability_name, $args = null)
    {
        return $capability_name;
    }
}
class Mixin_WordPress_Security_Action_Converter extends Mixin
{
    public function get_native_action($capability_name, $args = null)
    {
        switch ($capability_name) {
            case 'nextgen_edit_settings':
                $capability_name = 'NextGEN Change options';
                break;
            case 'nextgen_edit_style':
                $capability_name = 'NextGEN Change style';
                break;
            case 'nextgen_edit_display_settings':
                $capability_name = 'NextGEN Change options';
                break;
            case 'nextgen_edit_displayed_gallery':
                $capability_name = 'NextGEN Attach Interface';
                break;
            case 'nextgen_edit_gallery':
                $capability_name = 'NextGEN Manage gallery';
                break;
            case 'nextgen_edit_gallery_unowned':
                $capability_name = 'NextGEN Manage others gallery';
                break;
            case 'nextgen_upload_image':
                $capability_name = 'NextGEN Upload images';
                break;
            case 'nextgen_edit_album_settings':
                $capability_name = 'NextGEN Edit album settings';
                break;
            case 'nextgen_edit_album':
                $capability_name = 'NextGEN Edit album';
                break;
        }
        return $capability_name;
    }
}
class C_WordPress_Security_Actor extends C_Security_Actor
{
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->add_mixin('Mixin_WordPress_Security_Actor');
        $this->add_mixin('Mixin_WordPress_Security_Action_Converter');
    }
}
class Mixin_WordPress_Security_Manager extends Mixin
{
    public function get_actor($actor_id, $actor_type = null, $args = null)
    {
        if ($actor_type == null) {
            $actor_type = 'user';
        }
        $object = null;
        if ($actor_id != null) {
            switch ($actor_type) {
                case 'user':
                    $object = get_userdata($actor_id);
                    if ($object == false) {
                        $object = null;
                    }
                    break;
                case 'role':
                    $object = get_role($actor_id);
                    if ($object == false) {
                        $object = null;
                    }
                    break;
            }
        }
        if ($object != null) {
            $factory = C_Component_Factory::get_instance();
            $actor = $factory->create('wordpress_security_actor', $actor_type);
            $entity_props = array('type' => $actor_type, 'id' => $actor_id);
            $actor->set_entity($object, $entity_props);
            return $actor;
        }
        return $this->object->get_guest_actor();
    }
    public function get_current_actor()
    {
        // If the current_user has an id of 0, then perhaps something went wrong
        // with trying to parse the cookie. In that case, we'll force WordPress to try
        // again
        global $current_user;
        if ($current_user->ID == 0) {
            if (isset($GLOBALS['HTTP_COOKIE_VARS']) && isset($GLOBALS['_COOKIE'])) {
                $current_user = NULL;
                foreach ($GLOBALS['HTTP_COOKIE_VARS'] as $key => $value) {
                    if (!isset($_COOKIE[$key])) {
                        $_COOKIE[$key] = $value;
                    }
                }
            }
        }
        return $this->object->get_actor(get_current_user_id(), 'user');
    }
    public function get_guest_actor()
    {
        $factory = C_Component_Factory::get_instance();
        $actor = $factory->create('wordpress_security_actor', 'user');
        $entity_props = array('type' => 'user');
        $actor->set_entity(null, $entity_props);
        return $actor;
    }
}
class Mixin_WordPress_Security_Manager_Request extends Mixin
{
    public function get_request_token($action_name, $args = null)
    {
        $factory = C_Component_Factory::get_instance();
        $token = $factory->create('wordpress_security_token');
        $token->init_token($action_name, $args);
        return $token;
    }
}
class C_WordPress_Security_Manager extends C_Security_Manager
{
    static $_instances = array();
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->add_mixin('Mixin_WordPress_Security_Manager');
        $this->add_mixin('Mixin_WordPress_Security_Manager_Request');
    }
    static function get_instance($context = False)
    {
        if (!isset(self::$_instances[$context])) {
            $klass = get_class();
            self::$_instances[$context] = new $klass($context);
        }
        return self::$_instances[$context];
    }
}
class Mixin_Wordpress_Security_Token extends Mixin
{
    public function get_request_list($args = null)
    {
        $prefix = isset($args['prefix']) ? $args['prefix'] : null;
        $action_name = $this->object->get_action_name();
        $list = array();
        if ($prefix != null) {
            $list[$action_name . '_prefix'] = $prefix;
        }
        $action = $this->object->get_nonce_name();
        $list[$prefix . $action_name . '_sec'] = wp_create_nonce($action);
        return $list;
    }
    public function get_form_html($args = null)
    {
        $list = $this->object->get_request_list($args);
        $out = null;
        foreach ($list as $name => $value) {
            $out .= '<input type="hidden" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '" />';
        }
        return $out;
    }
    public function get_json($args = null)
    {
        $list = $this->object->get_request_list($args);
        return json_encode($list);
    }
    public function check_request($request_values)
    {
        $action_name = $this->object->get_action_name();
        $action = $this->object->get_nonce_name();
        $prefix = isset($request_values[$action_name . '_prefix']) ? $request_values[$action_name . '_prefix'] : null;
        if (isset($request_values[$prefix . $action_name . '_sec'])) {
            $nonce = $request_values[$prefix . $action_name . '_sec'];
            $result = wp_verify_nonce($nonce, $action);
            if ($result) {
                return true;
            }
        }
        return false;
    }
    public function get_nonce_name()
    {
        $action_name = $this->object->get_action_name();
        $prop_list = $this->object->get_property_list();
        $action = $action_name;
        foreach ($prop_list as $prop_name) {
            $property = $this->object->get_property($prop_name);
            $action .= '_' . strval($property);
        }
        return $action;
    }
}
class Mixin_Wordpress_Security_Token_MVC extends Mixin
{
    public function check_request($request_values)
    {
        // XXX check URL parameters passed with the MVC module
        //
        return $this->call_parent('check_request', $request_values);
    }
}
class C_Wordpress_Security_Token extends C_Security_Token
{
    public function define($context = FALSE)
    {
        parent::define($context);
        $this->add_mixin('Mixin_Wordpress_Security_Token');
        $this->add_mixin('Mixin_Wordpress_Security_Token_MVC');
    }
}