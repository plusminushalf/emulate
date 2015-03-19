<?php
class FluidCache_project_emulate_Standard_action_index_d0080db3415b937a35fa11619d98592f8d2b8fa8 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Emulate';
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper
$arguments1 = array();
$arguments1['role'] = 'project.emulate:User';
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$arguments1['packageKey'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return '
            <a href=\'/logout\'>logout</a>
        ';
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments7 = array();
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= '
            <br>
        <div class="row">
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments10 = array();
$arguments10['action'] = 'index';
$arguments10['controller'] = 'Standard';
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['arguments'] = array (
);
$arguments10['package'] = NULL;
$arguments10['subpackage'] = NULL;
$arguments10['section'] = '';
$arguments10['format'] = '';
$arguments10['additionalParams'] = array (
);
$arguments10['addQueryString'] = false;
$arguments10['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments10['useParentRequest'] = false;
$arguments10['absolute'] = true;
$arguments10['class'] = NULL;
$arguments10['dir'] = NULL;
$arguments10['id'] = NULL;
$arguments10['lang'] = NULL;
$arguments10['style'] = NULL;
$arguments10['title'] = NULL;
$arguments10['accesskey'] = NULL;
$arguments10['tabindex'] = NULL;
$arguments10['onclick'] = NULL;
$arguments10['name'] = NULL;
$arguments10['rel'] = NULL;
$arguments10['rev'] = NULL;
$arguments10['target'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return '<div type="button" class="col-md-offset-1 btn btn-primary" disable>EMULATE</div>';
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output9 .= $viewHelper12->initializeArgumentsAndRender();

$output9 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments13 = array();
$arguments13['action'] = 'help';
$arguments13['controller'] = 'Standard';
$arguments13['additionalAttributes'] = NULL;
$arguments13['data'] = NULL;
$arguments13['arguments'] = array (
);
$arguments13['package'] = NULL;
$arguments13['subpackage'] = NULL;
$arguments13['section'] = '';
$arguments13['format'] = '';
$arguments13['additionalParams'] = array (
);
$arguments13['addQueryString'] = false;
$arguments13['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments13['useParentRequest'] = false;
$arguments13['absolute'] = true;
$arguments13['class'] = NULL;
$arguments13['dir'] = NULL;
$arguments13['id'] = NULL;
$arguments13['lang'] = NULL;
$arguments13['style'] = NULL;
$arguments13['title'] = NULL;
$arguments13['accesskey'] = NULL;
$arguments13['tabindex'] = NULL;
$arguments13['onclick'] = NULL;
$arguments13['name'] = NULL;
$arguments13['rel'] = NULL;
$arguments13['rev'] = NULL;
$arguments13['target'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return '<button type="button" class="col-md-offset-8 btn btn-primary">Help</button>';
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output9 .= $viewHelper15->initializeArgumentsAndRender();

$output9 .= '
            <a target="_blank" href="https://www.facebook.com/garvitdelhi"><button type="button" class="col-md-offset-0 btn btn-primary">Developer</button></a>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="index" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <div class="text-danger">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments16 = array();
$arguments16['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.AuthenticationError', $renderingContext);
$arguments16['keepQuotes'] = false;
$arguments16['encoding'] = 'UTF-8';
$arguments16['doubleEncode'] = true;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
return NULL;
};
$value18 = ($arguments16['value'] !== NULL ? $arguments16['value'] : $renderChildrenClosure17());

$output9 .= (!is_string($value18) ? $value18 : htmlspecialchars($value18, ($arguments16['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments16['encoding'], $arguments16['doubleEncode']));

$output9 .= '
                                    </div>
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                           <div class="panel-heading">
                                <p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <c class="text-muted">Facebook</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <c class="text-muted">Google+</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <c class="text-muted">Github</c></p>
                            </div>
                        </div>
                           <div class="panel-heading">
                            <h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments19 = array();
$arguments19['method'] = 'post';
$arguments19['controller'] = 'UserAccount';
$arguments19['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.registrationform', $renderingContext);
$arguments19['objectName'] = 'userAccount';
$arguments19['action'] = 'accountRegistration';
$arguments19['additionalAttributes'] = NULL;
$arguments19['data'] = NULL;
$arguments19['arguments'] = array (
);
$arguments19['package'] = NULL;
$arguments19['subpackage'] = NULL;
$arguments19['section'] = '';
$arguments19['format'] = '';
$arguments19['additionalParams'] = array (
);
$arguments19['absolute'] = false;
$arguments19['addQueryString'] = false;
$arguments19['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments19['fieldNamePrefix'] = NULL;
$arguments19['actionUri'] = NULL;
$arguments19['useParentRequest'] = false;
$arguments19['enctype'] = NULL;
$arguments19['name'] = NULL;
$arguments19['onreset'] = NULL;
$arguments19['onsubmit'] = NULL;
$arguments19['class'] = NULL;
$arguments19['dir'] = NULL;
$arguments19['id'] = NULL;
$arguments19['lang'] = NULL;
$arguments19['style'] = NULL;
$arguments19['title'] = NULL;
$arguments19['accesskey'] = NULL;
$arguments19['tabindex'] = NULL;
$arguments19['onclick'] = NULL;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
$output21 = '';

$output21 .= '
                                <fieldset>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments22 = array();
$arguments22['type'] = 'text';
$arguments22['name'] = 'name';
$arguments22['property'] = 'name';
$arguments22['placeholder'] = 'Name';
$arguments22['class'] = 'form-control';
// Rendering Boolean node
$arguments22['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments22['additionalAttributes'] = NULL;
$arguments22['data'] = NULL;
$arguments22['value'] = NULL;
$arguments22['disabled'] = NULL;
$arguments22['maxlength'] = NULL;
$arguments22['readonly'] = NULL;
$arguments22['size'] = NULL;
$arguments22['autofocus'] = NULL;
$arguments22['errorClass'] = 'f3-form-error';
$arguments22['dir'] = NULL;
$arguments22['id'] = NULL;
$arguments22['lang'] = NULL;
$arguments22['style'] = NULL;
$arguments22['title'] = NULL;
$arguments22['accesskey'] = NULL;
$arguments22['tabindex'] = NULL;
$arguments22['onclick'] = NULL;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper24->setArguments($arguments22);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output21 .= $viewHelper24->initializeArgumentsAndRender();

$output21 .= '
                                    </div>
                                    <div class="form-group">
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments25 = array();
$arguments25['type'] = 'email';
$arguments25['name'] = 'email';
$arguments25['property'] = 'email';
$arguments25['placeholder'] = 'Email';
$arguments25['class'] = 'form-control';
// Rendering Boolean node
$arguments25['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments25['additionalAttributes'] = NULL;
$arguments25['data'] = NULL;
$arguments25['value'] = NULL;
$arguments25['disabled'] = NULL;
$arguments25['maxlength'] = NULL;
$arguments25['readonly'] = NULL;
$arguments25['size'] = NULL;
$arguments25['autofocus'] = NULL;
$arguments25['errorClass'] = 'f3-form-error';
$arguments25['dir'] = NULL;
$arguments25['id'] = NULL;
$arguments25['lang'] = NULL;
$arguments25['style'] = NULL;
$arguments25['title'] = NULL;
$arguments25['accesskey'] = NULL;
$arguments25['tabindex'] = NULL;
$arguments25['onclick'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper27->setArguments($arguments25);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output21 .= $viewHelper27->initializeArgumentsAndRender();

$output21 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments28 = array();
$arguments28['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.EmailRegistrationError', $renderingContext);
$arguments28['keepQuotes'] = false;
$arguments28['encoding'] = 'UTF-8';
$arguments28['doubleEncode'] = true;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$value30 = ($arguments28['value'] !== NULL ? $arguments28['value'] : $renderChildrenClosure29());

$output21 .= (!is_string($value30) ? $value30 : htmlspecialchars($value30, ($arguments28['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments28['encoding'], $arguments28['doubleEncode']));

$output21 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments31 = array();
$arguments31['type'] = 'text';
$arguments31['name'] = 'username';
$arguments31['property'] = 'username';
$arguments31['placeholder'] = 'Username';
$arguments31['class'] = 'form-control';
// Rendering Boolean node
$arguments31['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments31['additionalAttributes'] = NULL;
$arguments31['data'] = NULL;
$arguments31['value'] = NULL;
$arguments31['disabled'] = NULL;
$arguments31['maxlength'] = NULL;
$arguments31['readonly'] = NULL;
$arguments31['size'] = NULL;
$arguments31['autofocus'] = NULL;
$arguments31['errorClass'] = 'f3-form-error';
$arguments31['dir'] = NULL;
$arguments31['id'] = NULL;
$arguments31['lang'] = NULL;
$arguments31['style'] = NULL;
$arguments31['title'] = NULL;
$arguments31['accesskey'] = NULL;
$arguments31['tabindex'] = NULL;
$arguments31['onclick'] = NULL;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper33->setArguments($arguments31);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output21 .= $viewHelper33->initializeArgumentsAndRender();

$output21 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments34 = array();
$arguments34['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.UsernameRegistrationError', $renderingContext);
$arguments34['keepQuotes'] = false;
$arguments34['encoding'] = 'UTF-8';
$arguments34['doubleEncode'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$value36 = ($arguments34['value'] !== NULL ? $arguments34['value'] : $renderChildrenClosure35());

$output21 .= (!is_string($value36) ? $value36 : htmlspecialchars($value36, ($arguments34['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments34['encoding'], $arguments34['doubleEncode']));

$output21 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments37 = array();
$arguments37['type'] = 'password';
$arguments37['class'] = 'form-control';
$arguments37['property'] = 'password';
$arguments37['placeholder'] = 'Password';
$arguments37['name'] = 'password';
// Rendering Array
$array38 = array();
$array38['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'TRUE', $renderingContext);
$arguments37['additionalAttributes'] = $array38;
$arguments37['data'] = NULL;
$arguments37['required'] = false;
$arguments37['value'] = NULL;
$arguments37['disabled'] = NULL;
$arguments37['maxlength'] = NULL;
$arguments37['readonly'] = NULL;
$arguments37['size'] = NULL;
$arguments37['autofocus'] = NULL;
$arguments37['errorClass'] = 'f3-form-error';
$arguments37['dir'] = NULL;
$arguments37['id'] = NULL;
$arguments37['lang'] = NULL;
$arguments37['style'] = NULL;
$arguments37['title'] = NULL;
$arguments37['accesskey'] = NULL;
$arguments37['tabindex'] = NULL;
$arguments37['onclick'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper40 = $self->getViewHelper('$viewHelper40', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper40->setArguments($arguments37);
$viewHelper40->setRenderingContext($renderingContext);
$viewHelper40->setRenderChildrenClosure($renderChildrenClosure39);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output21 .= $viewHelper40->initializeArgumentsAndRender();

$output21 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments41 = array();
$arguments41['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.PasswordRegistrationError', $renderingContext);
$arguments41['keepQuotes'] = false;
$arguments41['encoding'] = 'UTF-8';
$arguments41['doubleEncode'] = true;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
return NULL;
};
$value43 = ($arguments41['value'] !== NULL ? $arguments41['value'] : $renderChildrenClosure42());

$output21 .= (!is_string($value43) ? $value43 : htmlspecialchars($value43, ($arguments41['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments41['encoding'], $arguments41['doubleEncode']));

$output21 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments44 = array();
$arguments44['property'] = 'gender';
$arguments44['value'] = 'Male';
// Rendering Boolean node
$arguments44['checked'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments44['additionalAttributes'] = NULL;
$arguments44['data'] = NULL;
$arguments44['name'] = NULL;
$arguments44['disabled'] = NULL;
$arguments44['errorClass'] = 'f3-form-error';
$arguments44['class'] = NULL;
$arguments44['dir'] = NULL;
$arguments44['id'] = NULL;
$arguments44['lang'] = NULL;
$arguments44['style'] = NULL;
$arguments44['title'] = NULL;
$arguments44['accesskey'] = NULL;
$arguments44['tabindex'] = NULL;
$arguments44['onclick'] = NULL;
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper46->setArguments($arguments44);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output21 .= $viewHelper46->initializeArgumentsAndRender();

$output21 .= 'Male
                                        </label>
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments47 = array();
$arguments47['property'] = 'gender';
$arguments47['value'] = 'Female';
$arguments47['additionalAttributes'] = NULL;
$arguments47['data'] = NULL;
$arguments47['checked'] = NULL;
$arguments47['name'] = NULL;
$arguments47['disabled'] = NULL;
$arguments47['errorClass'] = 'f3-form-error';
$arguments47['class'] = NULL;
$arguments47['dir'] = NULL;
$arguments47['id'] = NULL;
$arguments47['lang'] = NULL;
$arguments47['style'] = NULL;
$arguments47['title'] = NULL;
$arguments47['accesskey'] = NULL;
$arguments47['tabindex'] = NULL;
$arguments47['onclick'] = NULL;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper49->setArguments($arguments47);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure48);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output21 .= $viewHelper49->initializeArgumentsAndRender();

$output21 .= 'Female
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            ';
return $output21;
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper50->setArguments($arguments19);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output9 .= $viewHelper50->initializeArgumentsAndRender();

$output9 .= '
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
return $output9;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper51->setArguments($arguments7);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output3 .= $viewHelper51->initializeArgumentsAndRender();

$output3 .= '
    ';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
return '
            <a href=\'/logout\'>logout</a>
        ';
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$output52 = '';

$output52 .= '
            <br>
        <div class="row">
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments53 = array();
$arguments53['action'] = 'index';
$arguments53['controller'] = 'Standard';
$arguments53['additionalAttributes'] = NULL;
$arguments53['data'] = NULL;
$arguments53['arguments'] = array (
);
$arguments53['package'] = NULL;
$arguments53['subpackage'] = NULL;
$arguments53['section'] = '';
$arguments53['format'] = '';
$arguments53['additionalParams'] = array (
);
$arguments53['addQueryString'] = false;
$arguments53['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments53['useParentRequest'] = false;
$arguments53['absolute'] = true;
$arguments53['class'] = NULL;
$arguments53['dir'] = NULL;
$arguments53['id'] = NULL;
$arguments53['lang'] = NULL;
$arguments53['style'] = NULL;
$arguments53['title'] = NULL;
$arguments53['accesskey'] = NULL;
$arguments53['tabindex'] = NULL;
$arguments53['onclick'] = NULL;
$arguments53['name'] = NULL;
$arguments53['rel'] = NULL;
$arguments53['rev'] = NULL;
$arguments53['target'] = NULL;
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
return '<div type="button" class="col-md-offset-1 btn btn-primary" disable>EMULATE</div>';
};
$viewHelper55 = $self->getViewHelper('$viewHelper55', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper55->setArguments($arguments53);
$viewHelper55->setRenderingContext($renderingContext);
$viewHelper55->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output52 .= $viewHelper55->initializeArgumentsAndRender();

$output52 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments56 = array();
$arguments56['action'] = 'help';
$arguments56['controller'] = 'Standard';
$arguments56['additionalAttributes'] = NULL;
$arguments56['data'] = NULL;
$arguments56['arguments'] = array (
);
$arguments56['package'] = NULL;
$arguments56['subpackage'] = NULL;
$arguments56['section'] = '';
$arguments56['format'] = '';
$arguments56['additionalParams'] = array (
);
$arguments56['addQueryString'] = false;
$arguments56['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments56['useParentRequest'] = false;
$arguments56['absolute'] = true;
$arguments56['class'] = NULL;
$arguments56['dir'] = NULL;
$arguments56['id'] = NULL;
$arguments56['lang'] = NULL;
$arguments56['style'] = NULL;
$arguments56['title'] = NULL;
$arguments56['accesskey'] = NULL;
$arguments56['tabindex'] = NULL;
$arguments56['onclick'] = NULL;
$arguments56['name'] = NULL;
$arguments56['rel'] = NULL;
$arguments56['rev'] = NULL;
$arguments56['target'] = NULL;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
return '<button type="button" class="col-md-offset-8 btn btn-primary">Help</button>';
};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper58->setArguments($arguments56);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output52 .= $viewHelper58->initializeArgumentsAndRender();

$output52 .= '
            <a target="_blank" href="https://www.facebook.com/garvitdelhi"><button type="button" class="col-md-offset-0 btn btn-primary">Developer</button></a>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="index" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <div class="text-danger">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments59 = array();
$arguments59['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.AuthenticationError', $renderingContext);
$arguments59['keepQuotes'] = false;
$arguments59['encoding'] = 'UTF-8';
$arguments59['doubleEncode'] = true;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
return NULL;
};
$value61 = ($arguments59['value'] !== NULL ? $arguments59['value'] : $renderChildrenClosure60());

$output52 .= (!is_string($value61) ? $value61 : htmlspecialchars($value61, ($arguments59['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments59['encoding'], $arguments59['doubleEncode']));

$output52 .= '
                                    </div>
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                           <div class="panel-heading">
                                <p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <c class="text-muted">Facebook</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <c class="text-muted">Google+</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <c class="text-muted">Github</c></p>
                            </div>
                        </div>
                           <div class="panel-heading">
                            <h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments62 = array();
$arguments62['method'] = 'post';
$arguments62['controller'] = 'UserAccount';
$arguments62['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.registrationform', $renderingContext);
$arguments62['objectName'] = 'userAccount';
$arguments62['action'] = 'accountRegistration';
$arguments62['additionalAttributes'] = NULL;
$arguments62['data'] = NULL;
$arguments62['arguments'] = array (
);
$arguments62['package'] = NULL;
$arguments62['subpackage'] = NULL;
$arguments62['section'] = '';
$arguments62['format'] = '';
$arguments62['additionalParams'] = array (
);
$arguments62['absolute'] = false;
$arguments62['addQueryString'] = false;
$arguments62['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments62['fieldNamePrefix'] = NULL;
$arguments62['actionUri'] = NULL;
$arguments62['useParentRequest'] = false;
$arguments62['enctype'] = NULL;
$arguments62['name'] = NULL;
$arguments62['onreset'] = NULL;
$arguments62['onsubmit'] = NULL;
$arguments62['class'] = NULL;
$arguments62['dir'] = NULL;
$arguments62['id'] = NULL;
$arguments62['lang'] = NULL;
$arguments62['style'] = NULL;
$arguments62['title'] = NULL;
$arguments62['accesskey'] = NULL;
$arguments62['tabindex'] = NULL;
$arguments62['onclick'] = NULL;
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
$output64 = '';

$output64 .= '
                                <fieldset>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments65 = array();
$arguments65['type'] = 'text';
$arguments65['name'] = 'name';
$arguments65['property'] = 'name';
$arguments65['placeholder'] = 'Name';
$arguments65['class'] = 'form-control';
// Rendering Boolean node
$arguments65['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments65['additionalAttributes'] = NULL;
$arguments65['data'] = NULL;
$arguments65['value'] = NULL;
$arguments65['disabled'] = NULL;
$arguments65['maxlength'] = NULL;
$arguments65['readonly'] = NULL;
$arguments65['size'] = NULL;
$arguments65['autofocus'] = NULL;
$arguments65['errorClass'] = 'f3-form-error';
$arguments65['dir'] = NULL;
$arguments65['id'] = NULL;
$arguments65['lang'] = NULL;
$arguments65['style'] = NULL;
$arguments65['title'] = NULL;
$arguments65['accesskey'] = NULL;
$arguments65['tabindex'] = NULL;
$arguments65['onclick'] = NULL;
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper67 = $self->getViewHelper('$viewHelper67', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper67->setArguments($arguments65);
$viewHelper67->setRenderingContext($renderingContext);
$viewHelper67->setRenderChildrenClosure($renderChildrenClosure66);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output64 .= $viewHelper67->initializeArgumentsAndRender();

$output64 .= '
                                    </div>
                                    <div class="form-group">
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments68 = array();
$arguments68['type'] = 'email';
$arguments68['name'] = 'email';
$arguments68['property'] = 'email';
$arguments68['placeholder'] = 'Email';
$arguments68['class'] = 'form-control';
// Rendering Boolean node
$arguments68['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments68['additionalAttributes'] = NULL;
$arguments68['data'] = NULL;
$arguments68['value'] = NULL;
$arguments68['disabled'] = NULL;
$arguments68['maxlength'] = NULL;
$arguments68['readonly'] = NULL;
$arguments68['size'] = NULL;
$arguments68['autofocus'] = NULL;
$arguments68['errorClass'] = 'f3-form-error';
$arguments68['dir'] = NULL;
$arguments68['id'] = NULL;
$arguments68['lang'] = NULL;
$arguments68['style'] = NULL;
$arguments68['title'] = NULL;
$arguments68['accesskey'] = NULL;
$arguments68['tabindex'] = NULL;
$arguments68['onclick'] = NULL;
$renderChildrenClosure69 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper70 = $self->getViewHelper('$viewHelper70', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper70->setArguments($arguments68);
$viewHelper70->setRenderingContext($renderingContext);
$viewHelper70->setRenderChildrenClosure($renderChildrenClosure69);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output64 .= $viewHelper70->initializeArgumentsAndRender();

$output64 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments71 = array();
$arguments71['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.EmailRegistrationError', $renderingContext);
$arguments71['keepQuotes'] = false;
$arguments71['encoding'] = 'UTF-8';
$arguments71['doubleEncode'] = true;
$renderChildrenClosure72 = function() use ($renderingContext, $self) {
return NULL;
};
$value73 = ($arguments71['value'] !== NULL ? $arguments71['value'] : $renderChildrenClosure72());

$output64 .= (!is_string($value73) ? $value73 : htmlspecialchars($value73, ($arguments71['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments71['encoding'], $arguments71['doubleEncode']));

$output64 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments74 = array();
$arguments74['type'] = 'text';
$arguments74['name'] = 'username';
$arguments74['property'] = 'username';
$arguments74['placeholder'] = 'Username';
$arguments74['class'] = 'form-control';
// Rendering Boolean node
$arguments74['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments74['additionalAttributes'] = NULL;
$arguments74['data'] = NULL;
$arguments74['value'] = NULL;
$arguments74['disabled'] = NULL;
$arguments74['maxlength'] = NULL;
$arguments74['readonly'] = NULL;
$arguments74['size'] = NULL;
$arguments74['autofocus'] = NULL;
$arguments74['errorClass'] = 'f3-form-error';
$arguments74['dir'] = NULL;
$arguments74['id'] = NULL;
$arguments74['lang'] = NULL;
$arguments74['style'] = NULL;
$arguments74['title'] = NULL;
$arguments74['accesskey'] = NULL;
$arguments74['tabindex'] = NULL;
$arguments74['onclick'] = NULL;
$renderChildrenClosure75 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper76 = $self->getViewHelper('$viewHelper76', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper76->setArguments($arguments74);
$viewHelper76->setRenderingContext($renderingContext);
$viewHelper76->setRenderChildrenClosure($renderChildrenClosure75);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output64 .= $viewHelper76->initializeArgumentsAndRender();

$output64 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments77 = array();
$arguments77['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.UsernameRegistrationError', $renderingContext);
$arguments77['keepQuotes'] = false;
$arguments77['encoding'] = 'UTF-8';
$arguments77['doubleEncode'] = true;
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
return NULL;
};
$value79 = ($arguments77['value'] !== NULL ? $arguments77['value'] : $renderChildrenClosure78());

$output64 .= (!is_string($value79) ? $value79 : htmlspecialchars($value79, ($arguments77['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments77['encoding'], $arguments77['doubleEncode']));

$output64 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments80 = array();
$arguments80['type'] = 'password';
$arguments80['class'] = 'form-control';
$arguments80['property'] = 'password';
$arguments80['placeholder'] = 'Password';
$arguments80['name'] = 'password';
// Rendering Array
$array81 = array();
$array81['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'TRUE', $renderingContext);
$arguments80['additionalAttributes'] = $array81;
$arguments80['data'] = NULL;
$arguments80['required'] = false;
$arguments80['value'] = NULL;
$arguments80['disabled'] = NULL;
$arguments80['maxlength'] = NULL;
$arguments80['readonly'] = NULL;
$arguments80['size'] = NULL;
$arguments80['autofocus'] = NULL;
$arguments80['errorClass'] = 'f3-form-error';
$arguments80['dir'] = NULL;
$arguments80['id'] = NULL;
$arguments80['lang'] = NULL;
$arguments80['style'] = NULL;
$arguments80['title'] = NULL;
$arguments80['accesskey'] = NULL;
$arguments80['tabindex'] = NULL;
$arguments80['onclick'] = NULL;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper83 = $self->getViewHelper('$viewHelper83', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper83->setArguments($arguments80);
$viewHelper83->setRenderingContext($renderingContext);
$viewHelper83->setRenderChildrenClosure($renderChildrenClosure82);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output64 .= $viewHelper83->initializeArgumentsAndRender();

$output64 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments84 = array();
$arguments84['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.PasswordRegistrationError', $renderingContext);
$arguments84['keepQuotes'] = false;
$arguments84['encoding'] = 'UTF-8';
$arguments84['doubleEncode'] = true;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
return NULL;
};
$value86 = ($arguments84['value'] !== NULL ? $arguments84['value'] : $renderChildrenClosure85());

$output64 .= (!is_string($value86) ? $value86 : htmlspecialchars($value86, ($arguments84['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments84['encoding'], $arguments84['doubleEncode']));

$output64 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments87 = array();
$arguments87['property'] = 'gender';
$arguments87['value'] = 'Male';
// Rendering Boolean node
$arguments87['checked'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments87['additionalAttributes'] = NULL;
$arguments87['data'] = NULL;
$arguments87['name'] = NULL;
$arguments87['disabled'] = NULL;
$arguments87['errorClass'] = 'f3-form-error';
$arguments87['class'] = NULL;
$arguments87['dir'] = NULL;
$arguments87['id'] = NULL;
$arguments87['lang'] = NULL;
$arguments87['style'] = NULL;
$arguments87['title'] = NULL;
$arguments87['accesskey'] = NULL;
$arguments87['tabindex'] = NULL;
$arguments87['onclick'] = NULL;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper89->setArguments($arguments87);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure88);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output64 .= $viewHelper89->initializeArgumentsAndRender();

$output64 .= 'Male
                                        </label>
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments90 = array();
$arguments90['property'] = 'gender';
$arguments90['value'] = 'Female';
$arguments90['additionalAttributes'] = NULL;
$arguments90['data'] = NULL;
$arguments90['checked'] = NULL;
$arguments90['name'] = NULL;
$arguments90['disabled'] = NULL;
$arguments90['errorClass'] = 'f3-form-error';
$arguments90['class'] = NULL;
$arguments90['dir'] = NULL;
$arguments90['id'] = NULL;
$arguments90['lang'] = NULL;
$arguments90['style'] = NULL;
$arguments90['title'] = NULL;
$arguments90['accesskey'] = NULL;
$arguments90['tabindex'] = NULL;
$arguments90['onclick'] = NULL;
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper92->setArguments($arguments90);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output64 .= $viewHelper92->initializeArgumentsAndRender();

$output64 .= 'Female
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            ';
return $output64;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper93->setArguments($arguments62);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output52 .= $viewHelper93->initializeArgumentsAndRender();

$output52 .= '
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
return $output52;
};
$viewHelper94 = $self->getViewHelper('$viewHelper94', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper');
$viewHelper94->setArguments($arguments1);
$viewHelper94->setRenderingContext($renderingContext);
$viewHelper94->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper

$output0 .= $viewHelper94->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output95 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments96 = array();
$arguments96['name'] = 'Default';
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper98 = $self->getViewHelper('$viewHelper98', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper98->setArguments($arguments96);
$viewHelper98->setRenderingContext($renderingContext);
$viewHelper98->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper

$output95 .= $viewHelper98->initializeArgumentsAndRender();

$output95 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments99 = array();
$arguments99['name'] = 'Title';
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return 'Emulate';
};

$output95 .= '';

$output95 .= '
';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments101 = array();
$arguments101['name'] = 'Content';
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$output103 = '';

$output103 .= '
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper
$arguments104 = array();
$arguments104['role'] = 'project.emulate:User';
$arguments104['then'] = NULL;
$arguments104['else'] = NULL;
$arguments104['packageKey'] = NULL;
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
$output106 = '';

$output106 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments107 = array();
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
return '
            <a href=\'/logout\'>logout</a>
        ';
};
$viewHelper109 = $self->getViewHelper('$viewHelper109', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper109->setArguments($arguments107);
$viewHelper109->setRenderingContext($renderingContext);
$viewHelper109->setRenderChildrenClosure($renderChildrenClosure108);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output106 .= $viewHelper109->initializeArgumentsAndRender();

$output106 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments110 = array();
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
$output112 = '';

$output112 .= '
            <br>
        <div class="row">
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments113 = array();
$arguments113['action'] = 'index';
$arguments113['controller'] = 'Standard';
$arguments113['additionalAttributes'] = NULL;
$arguments113['data'] = NULL;
$arguments113['arguments'] = array (
);
$arguments113['package'] = NULL;
$arguments113['subpackage'] = NULL;
$arguments113['section'] = '';
$arguments113['format'] = '';
$arguments113['additionalParams'] = array (
);
$arguments113['addQueryString'] = false;
$arguments113['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments113['useParentRequest'] = false;
$arguments113['absolute'] = true;
$arguments113['class'] = NULL;
$arguments113['dir'] = NULL;
$arguments113['id'] = NULL;
$arguments113['lang'] = NULL;
$arguments113['style'] = NULL;
$arguments113['title'] = NULL;
$arguments113['accesskey'] = NULL;
$arguments113['tabindex'] = NULL;
$arguments113['onclick'] = NULL;
$arguments113['name'] = NULL;
$arguments113['rel'] = NULL;
$arguments113['rev'] = NULL;
$arguments113['target'] = NULL;
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
return '<div type="button" class="col-md-offset-1 btn btn-primary" disable>EMULATE</div>';
};
$viewHelper115 = $self->getViewHelper('$viewHelper115', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper115->setArguments($arguments113);
$viewHelper115->setRenderingContext($renderingContext);
$viewHelper115->setRenderChildrenClosure($renderChildrenClosure114);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output112 .= $viewHelper115->initializeArgumentsAndRender();

$output112 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments116 = array();
$arguments116['action'] = 'help';
$arguments116['controller'] = 'Standard';
$arguments116['additionalAttributes'] = NULL;
$arguments116['data'] = NULL;
$arguments116['arguments'] = array (
);
$arguments116['package'] = NULL;
$arguments116['subpackage'] = NULL;
$arguments116['section'] = '';
$arguments116['format'] = '';
$arguments116['additionalParams'] = array (
);
$arguments116['addQueryString'] = false;
$arguments116['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments116['useParentRequest'] = false;
$arguments116['absolute'] = true;
$arguments116['class'] = NULL;
$arguments116['dir'] = NULL;
$arguments116['id'] = NULL;
$arguments116['lang'] = NULL;
$arguments116['style'] = NULL;
$arguments116['title'] = NULL;
$arguments116['accesskey'] = NULL;
$arguments116['tabindex'] = NULL;
$arguments116['onclick'] = NULL;
$arguments116['name'] = NULL;
$arguments116['rel'] = NULL;
$arguments116['rev'] = NULL;
$arguments116['target'] = NULL;
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
return '<button type="button" class="col-md-offset-8 btn btn-primary">Help</button>';
};
$viewHelper118 = $self->getViewHelper('$viewHelper118', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper118->setArguments($arguments116);
$viewHelper118->setRenderingContext($renderingContext);
$viewHelper118->setRenderChildrenClosure($renderChildrenClosure117);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output112 .= $viewHelper118->initializeArgumentsAndRender();

$output112 .= '
            <a target="_blank" href="https://www.facebook.com/garvitdelhi"><button type="button" class="col-md-offset-0 btn btn-primary">Developer</button></a>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="index" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <div class="text-danger">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments119 = array();
$arguments119['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.AuthenticationError', $renderingContext);
$arguments119['keepQuotes'] = false;
$arguments119['encoding'] = 'UTF-8';
$arguments119['doubleEncode'] = true;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
$value121 = ($arguments119['value'] !== NULL ? $arguments119['value'] : $renderChildrenClosure120());

$output112 .= (!is_string($value121) ? $value121 : htmlspecialchars($value121, ($arguments119['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments119['encoding'], $arguments119['doubleEncode']));

$output112 .= '
                                    </div>
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                           <div class="panel-heading">
                                <p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <c class="text-muted">Facebook</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <c class="text-muted">Google+</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <c class="text-muted">Github</c></p>
                            </div>
                        </div>
                           <div class="panel-heading">
                            <h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments122 = array();
$arguments122['method'] = 'post';
$arguments122['controller'] = 'UserAccount';
$arguments122['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.registrationform', $renderingContext);
$arguments122['objectName'] = 'userAccount';
$arguments122['action'] = 'accountRegistration';
$arguments122['additionalAttributes'] = NULL;
$arguments122['data'] = NULL;
$arguments122['arguments'] = array (
);
$arguments122['package'] = NULL;
$arguments122['subpackage'] = NULL;
$arguments122['section'] = '';
$arguments122['format'] = '';
$arguments122['additionalParams'] = array (
);
$arguments122['absolute'] = false;
$arguments122['addQueryString'] = false;
$arguments122['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments122['fieldNamePrefix'] = NULL;
$arguments122['actionUri'] = NULL;
$arguments122['useParentRequest'] = false;
$arguments122['enctype'] = NULL;
$arguments122['name'] = NULL;
$arguments122['onreset'] = NULL;
$arguments122['onsubmit'] = NULL;
$arguments122['class'] = NULL;
$arguments122['dir'] = NULL;
$arguments122['id'] = NULL;
$arguments122['lang'] = NULL;
$arguments122['style'] = NULL;
$arguments122['title'] = NULL;
$arguments122['accesskey'] = NULL;
$arguments122['tabindex'] = NULL;
$arguments122['onclick'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
$output124 = '';

$output124 .= '
                                <fieldset>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments125 = array();
$arguments125['type'] = 'text';
$arguments125['name'] = 'name';
$arguments125['property'] = 'name';
$arguments125['placeholder'] = 'Name';
$arguments125['class'] = 'form-control';
// Rendering Boolean node
$arguments125['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments125['additionalAttributes'] = NULL;
$arguments125['data'] = NULL;
$arguments125['value'] = NULL;
$arguments125['disabled'] = NULL;
$arguments125['maxlength'] = NULL;
$arguments125['readonly'] = NULL;
$arguments125['size'] = NULL;
$arguments125['autofocus'] = NULL;
$arguments125['errorClass'] = 'f3-form-error';
$arguments125['dir'] = NULL;
$arguments125['id'] = NULL;
$arguments125['lang'] = NULL;
$arguments125['style'] = NULL;
$arguments125['title'] = NULL;
$arguments125['accesskey'] = NULL;
$arguments125['tabindex'] = NULL;
$arguments125['onclick'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper127 = $self->getViewHelper('$viewHelper127', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper127->setArguments($arguments125);
$viewHelper127->setRenderingContext($renderingContext);
$viewHelper127->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output124 .= $viewHelper127->initializeArgumentsAndRender();

$output124 .= '
                                    </div>
                                    <div class="form-group">
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments128 = array();
$arguments128['type'] = 'email';
$arguments128['name'] = 'email';
$arguments128['property'] = 'email';
$arguments128['placeholder'] = 'Email';
$arguments128['class'] = 'form-control';
// Rendering Boolean node
$arguments128['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments128['additionalAttributes'] = NULL;
$arguments128['data'] = NULL;
$arguments128['value'] = NULL;
$arguments128['disabled'] = NULL;
$arguments128['maxlength'] = NULL;
$arguments128['readonly'] = NULL;
$arguments128['size'] = NULL;
$arguments128['autofocus'] = NULL;
$arguments128['errorClass'] = 'f3-form-error';
$arguments128['dir'] = NULL;
$arguments128['id'] = NULL;
$arguments128['lang'] = NULL;
$arguments128['style'] = NULL;
$arguments128['title'] = NULL;
$arguments128['accesskey'] = NULL;
$arguments128['tabindex'] = NULL;
$arguments128['onclick'] = NULL;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper130 = $self->getViewHelper('$viewHelper130', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper130->setArguments($arguments128);
$viewHelper130->setRenderingContext($renderingContext);
$viewHelper130->setRenderChildrenClosure($renderChildrenClosure129);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output124 .= $viewHelper130->initializeArgumentsAndRender();

$output124 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments131 = array();
$arguments131['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.EmailRegistrationError', $renderingContext);
$arguments131['keepQuotes'] = false;
$arguments131['encoding'] = 'UTF-8';
$arguments131['doubleEncode'] = true;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
return NULL;
};
$value133 = ($arguments131['value'] !== NULL ? $arguments131['value'] : $renderChildrenClosure132());

$output124 .= (!is_string($value133) ? $value133 : htmlspecialchars($value133, ($arguments131['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments131['encoding'], $arguments131['doubleEncode']));

$output124 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments134 = array();
$arguments134['type'] = 'text';
$arguments134['name'] = 'username';
$arguments134['property'] = 'username';
$arguments134['placeholder'] = 'Username';
$arguments134['class'] = 'form-control';
// Rendering Boolean node
$arguments134['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments134['additionalAttributes'] = NULL;
$arguments134['data'] = NULL;
$arguments134['value'] = NULL;
$arguments134['disabled'] = NULL;
$arguments134['maxlength'] = NULL;
$arguments134['readonly'] = NULL;
$arguments134['size'] = NULL;
$arguments134['autofocus'] = NULL;
$arguments134['errorClass'] = 'f3-form-error';
$arguments134['dir'] = NULL;
$arguments134['id'] = NULL;
$arguments134['lang'] = NULL;
$arguments134['style'] = NULL;
$arguments134['title'] = NULL;
$arguments134['accesskey'] = NULL;
$arguments134['tabindex'] = NULL;
$arguments134['onclick'] = NULL;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper136 = $self->getViewHelper('$viewHelper136', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper136->setArguments($arguments134);
$viewHelper136->setRenderingContext($renderingContext);
$viewHelper136->setRenderChildrenClosure($renderChildrenClosure135);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output124 .= $viewHelper136->initializeArgumentsAndRender();

$output124 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments137 = array();
$arguments137['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.UsernameRegistrationError', $renderingContext);
$arguments137['keepQuotes'] = false;
$arguments137['encoding'] = 'UTF-8';
$arguments137['doubleEncode'] = true;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return NULL;
};
$value139 = ($arguments137['value'] !== NULL ? $arguments137['value'] : $renderChildrenClosure138());

$output124 .= (!is_string($value139) ? $value139 : htmlspecialchars($value139, ($arguments137['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments137['encoding'], $arguments137['doubleEncode']));

$output124 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments140 = array();
$arguments140['type'] = 'password';
$arguments140['class'] = 'form-control';
$arguments140['property'] = 'password';
$arguments140['placeholder'] = 'Password';
$arguments140['name'] = 'password';
// Rendering Array
$array141 = array();
$array141['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'TRUE', $renderingContext);
$arguments140['additionalAttributes'] = $array141;
$arguments140['data'] = NULL;
$arguments140['required'] = false;
$arguments140['value'] = NULL;
$arguments140['disabled'] = NULL;
$arguments140['maxlength'] = NULL;
$arguments140['readonly'] = NULL;
$arguments140['size'] = NULL;
$arguments140['autofocus'] = NULL;
$arguments140['errorClass'] = 'f3-form-error';
$arguments140['dir'] = NULL;
$arguments140['id'] = NULL;
$arguments140['lang'] = NULL;
$arguments140['style'] = NULL;
$arguments140['title'] = NULL;
$arguments140['accesskey'] = NULL;
$arguments140['tabindex'] = NULL;
$arguments140['onclick'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper143 = $self->getViewHelper('$viewHelper143', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper143->setArguments($arguments140);
$viewHelper143->setRenderingContext($renderingContext);
$viewHelper143->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output124 .= $viewHelper143->initializeArgumentsAndRender();

$output124 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments144 = array();
$arguments144['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.PasswordRegistrationError', $renderingContext);
$arguments144['keepQuotes'] = false;
$arguments144['encoding'] = 'UTF-8';
$arguments144['doubleEncode'] = true;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
return NULL;
};
$value146 = ($arguments144['value'] !== NULL ? $arguments144['value'] : $renderChildrenClosure145());

$output124 .= (!is_string($value146) ? $value146 : htmlspecialchars($value146, ($arguments144['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments144['encoding'], $arguments144['doubleEncode']));

$output124 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments147 = array();
$arguments147['property'] = 'gender';
$arguments147['value'] = 'Male';
// Rendering Boolean node
$arguments147['checked'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments147['additionalAttributes'] = NULL;
$arguments147['data'] = NULL;
$arguments147['name'] = NULL;
$arguments147['disabled'] = NULL;
$arguments147['errorClass'] = 'f3-form-error';
$arguments147['class'] = NULL;
$arguments147['dir'] = NULL;
$arguments147['id'] = NULL;
$arguments147['lang'] = NULL;
$arguments147['style'] = NULL;
$arguments147['title'] = NULL;
$arguments147['accesskey'] = NULL;
$arguments147['tabindex'] = NULL;
$arguments147['onclick'] = NULL;
$renderChildrenClosure148 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper149 = $self->getViewHelper('$viewHelper149', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper149->setArguments($arguments147);
$viewHelper149->setRenderingContext($renderingContext);
$viewHelper149->setRenderChildrenClosure($renderChildrenClosure148);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output124 .= $viewHelper149->initializeArgumentsAndRender();

$output124 .= 'Male
                                        </label>
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments150 = array();
$arguments150['property'] = 'gender';
$arguments150['value'] = 'Female';
$arguments150['additionalAttributes'] = NULL;
$arguments150['data'] = NULL;
$arguments150['checked'] = NULL;
$arguments150['name'] = NULL;
$arguments150['disabled'] = NULL;
$arguments150['errorClass'] = 'f3-form-error';
$arguments150['class'] = NULL;
$arguments150['dir'] = NULL;
$arguments150['id'] = NULL;
$arguments150['lang'] = NULL;
$arguments150['style'] = NULL;
$arguments150['title'] = NULL;
$arguments150['accesskey'] = NULL;
$arguments150['tabindex'] = NULL;
$arguments150['onclick'] = NULL;
$renderChildrenClosure151 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper152 = $self->getViewHelper('$viewHelper152', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper152->setArguments($arguments150);
$viewHelper152->setRenderingContext($renderingContext);
$viewHelper152->setRenderChildrenClosure($renderChildrenClosure151);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output124 .= $viewHelper152->initializeArgumentsAndRender();

$output124 .= 'Female
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            ';
return $output124;
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper153->setArguments($arguments122);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure123);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output112 .= $viewHelper153->initializeArgumentsAndRender();

$output112 .= '
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
return $output112;
};
$viewHelper154 = $self->getViewHelper('$viewHelper154', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper154->setArguments($arguments110);
$viewHelper154->setRenderingContext($renderingContext);
$viewHelper154->setRenderChildrenClosure($renderChildrenClosure111);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output106 .= $viewHelper154->initializeArgumentsAndRender();

$output106 .= '
    ';
return $output106;
};
$arguments104['__thenClosure'] = function() use ($renderingContext, $self) {
return '
            <a href=\'/logout\'>logout</a>
        ';
};
$arguments104['__elseClosure'] = function() use ($renderingContext, $self) {
$output155 = '';

$output155 .= '
            <br>
        <div class="row">
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments156 = array();
$arguments156['action'] = 'index';
$arguments156['controller'] = 'Standard';
$arguments156['additionalAttributes'] = NULL;
$arguments156['data'] = NULL;
$arguments156['arguments'] = array (
);
$arguments156['package'] = NULL;
$arguments156['subpackage'] = NULL;
$arguments156['section'] = '';
$arguments156['format'] = '';
$arguments156['additionalParams'] = array (
);
$arguments156['addQueryString'] = false;
$arguments156['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments156['useParentRequest'] = false;
$arguments156['absolute'] = true;
$arguments156['class'] = NULL;
$arguments156['dir'] = NULL;
$arguments156['id'] = NULL;
$arguments156['lang'] = NULL;
$arguments156['style'] = NULL;
$arguments156['title'] = NULL;
$arguments156['accesskey'] = NULL;
$arguments156['tabindex'] = NULL;
$arguments156['onclick'] = NULL;
$arguments156['name'] = NULL;
$arguments156['rel'] = NULL;
$arguments156['rev'] = NULL;
$arguments156['target'] = NULL;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
return '<div type="button" class="col-md-offset-1 btn btn-primary" disable>EMULATE</div>';
};
$viewHelper158 = $self->getViewHelper('$viewHelper158', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper158->setArguments($arguments156);
$viewHelper158->setRenderingContext($renderingContext);
$viewHelper158->setRenderChildrenClosure($renderChildrenClosure157);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output155 .= $viewHelper158->initializeArgumentsAndRender();

$output155 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments159 = array();
$arguments159['action'] = 'help';
$arguments159['controller'] = 'Standard';
$arguments159['additionalAttributes'] = NULL;
$arguments159['data'] = NULL;
$arguments159['arguments'] = array (
);
$arguments159['package'] = NULL;
$arguments159['subpackage'] = NULL;
$arguments159['section'] = '';
$arguments159['format'] = '';
$arguments159['additionalParams'] = array (
);
$arguments159['addQueryString'] = false;
$arguments159['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments159['useParentRequest'] = false;
$arguments159['absolute'] = true;
$arguments159['class'] = NULL;
$arguments159['dir'] = NULL;
$arguments159['id'] = NULL;
$arguments159['lang'] = NULL;
$arguments159['style'] = NULL;
$arguments159['title'] = NULL;
$arguments159['accesskey'] = NULL;
$arguments159['tabindex'] = NULL;
$arguments159['onclick'] = NULL;
$arguments159['name'] = NULL;
$arguments159['rel'] = NULL;
$arguments159['rev'] = NULL;
$arguments159['target'] = NULL;
$renderChildrenClosure160 = function() use ($renderingContext, $self) {
return '<button type="button" class="col-md-offset-8 btn btn-primary">Help</button>';
};
$viewHelper161 = $self->getViewHelper('$viewHelper161', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper161->setArguments($arguments159);
$viewHelper161->setRenderingContext($renderingContext);
$viewHelper161->setRenderChildrenClosure($renderChildrenClosure160);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output155 .= $viewHelper161->initializeArgumentsAndRender();

$output155 .= '
            <a target="_blank" href="https://www.facebook.com/garvitdelhi"><button type="button" class="col-md-offset-0 btn btn-primary">Developer</button></a>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method=\'post\' action="index" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]" type=\'text\' autofocus="" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]" type="password" value="" />
                                    </div>
                                    <div class="text-danger">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments162 = array();
$arguments162['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.AuthenticationError', $renderingContext);
$arguments162['keepQuotes'] = false;
$arguments162['encoding'] = 'UTF-8';
$arguments162['doubleEncode'] = true;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$value164 = ($arguments162['value'] !== NULL ? $arguments162['value'] : $renderChildrenClosure163());

$output155 .= (!is_string($value164) ? $value164 : htmlspecialchars($value164, ($arguments162['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments162['encoding'], $arguments162['doubleEncode']));

$output155 .= '
                                    </div>
                                    <p class="text-primary text-right"><a  href="http://typo.flow/">Forgot password</a></p>
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Login\' />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="login-panel panel panel-default">
                           <div class="panel-heading">
                                <p class="panel-title">Social Signup</p>
                        </div>
                        <div class="panel-body">
                            <div>
                                <p><a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <c class="text-muted">Facebook</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <c class="text-muted">Google+</c>
                                <a href="http://typo.flow/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                                <c class="text-muted">Github</c></p>
                            </div>
                        </div>
                           <div class="panel-heading">
                            <h3 class="panel-title">Create a New Account</h3>
                        </div>
                        <div class="panel-body">
                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments165 = array();
$arguments165['method'] = 'post';
$arguments165['controller'] = 'UserAccount';
$arguments165['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.registrationform', $renderingContext);
$arguments165['objectName'] = 'userAccount';
$arguments165['action'] = 'accountRegistration';
$arguments165['additionalAttributes'] = NULL;
$arguments165['data'] = NULL;
$arguments165['arguments'] = array (
);
$arguments165['package'] = NULL;
$arguments165['subpackage'] = NULL;
$arguments165['section'] = '';
$arguments165['format'] = '';
$arguments165['additionalParams'] = array (
);
$arguments165['absolute'] = false;
$arguments165['addQueryString'] = false;
$arguments165['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments165['fieldNamePrefix'] = NULL;
$arguments165['actionUri'] = NULL;
$arguments165['useParentRequest'] = false;
$arguments165['enctype'] = NULL;
$arguments165['name'] = NULL;
$arguments165['onreset'] = NULL;
$arguments165['onsubmit'] = NULL;
$arguments165['class'] = NULL;
$arguments165['dir'] = NULL;
$arguments165['id'] = NULL;
$arguments165['lang'] = NULL;
$arguments165['style'] = NULL;
$arguments165['title'] = NULL;
$arguments165['accesskey'] = NULL;
$arguments165['tabindex'] = NULL;
$arguments165['onclick'] = NULL;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
$output167 = '';

$output167 .= '
                                <fieldset>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments168 = array();
$arguments168['type'] = 'text';
$arguments168['name'] = 'name';
$arguments168['property'] = 'name';
$arguments168['placeholder'] = 'Name';
$arguments168['class'] = 'form-control';
// Rendering Boolean node
$arguments168['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments168['additionalAttributes'] = NULL;
$arguments168['data'] = NULL;
$arguments168['value'] = NULL;
$arguments168['disabled'] = NULL;
$arguments168['maxlength'] = NULL;
$arguments168['readonly'] = NULL;
$arguments168['size'] = NULL;
$arguments168['autofocus'] = NULL;
$arguments168['errorClass'] = 'f3-form-error';
$arguments168['dir'] = NULL;
$arguments168['id'] = NULL;
$arguments168['lang'] = NULL;
$arguments168['style'] = NULL;
$arguments168['title'] = NULL;
$arguments168['accesskey'] = NULL;
$arguments168['tabindex'] = NULL;
$arguments168['onclick'] = NULL;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper170 = $self->getViewHelper('$viewHelper170', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper170->setArguments($arguments168);
$viewHelper170->setRenderingContext($renderingContext);
$viewHelper170->setRenderChildrenClosure($renderChildrenClosure169);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output167 .= $viewHelper170->initializeArgumentsAndRender();

$output167 .= '
                                    </div>
                                    <div class="form-group">
                                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments171 = array();
$arguments171['type'] = 'email';
$arguments171['name'] = 'email';
$arguments171['property'] = 'email';
$arguments171['placeholder'] = 'Email';
$arguments171['class'] = 'form-control';
// Rendering Boolean node
$arguments171['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments171['additionalAttributes'] = NULL;
$arguments171['data'] = NULL;
$arguments171['value'] = NULL;
$arguments171['disabled'] = NULL;
$arguments171['maxlength'] = NULL;
$arguments171['readonly'] = NULL;
$arguments171['size'] = NULL;
$arguments171['autofocus'] = NULL;
$arguments171['errorClass'] = 'f3-form-error';
$arguments171['dir'] = NULL;
$arguments171['id'] = NULL;
$arguments171['lang'] = NULL;
$arguments171['style'] = NULL;
$arguments171['title'] = NULL;
$arguments171['accesskey'] = NULL;
$arguments171['tabindex'] = NULL;
$arguments171['onclick'] = NULL;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper173 = $self->getViewHelper('$viewHelper173', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper173->setArguments($arguments171);
$viewHelper173->setRenderingContext($renderingContext);
$viewHelper173->setRenderChildrenClosure($renderChildrenClosure172);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output167 .= $viewHelper173->initializeArgumentsAndRender();

$output167 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments174 = array();
$arguments174['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.EmailRegistrationError', $renderingContext);
$arguments174['keepQuotes'] = false;
$arguments174['encoding'] = 'UTF-8';
$arguments174['doubleEncode'] = true;
$renderChildrenClosure175 = function() use ($renderingContext, $self) {
return NULL;
};
$value176 = ($arguments174['value'] !== NULL ? $arguments174['value'] : $renderChildrenClosure175());

$output167 .= (!is_string($value176) ? $value176 : htmlspecialchars($value176, ($arguments174['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments174['encoding'], $arguments174['doubleEncode']));

$output167 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments177 = array();
$arguments177['type'] = 'text';
$arguments177['name'] = 'username';
$arguments177['property'] = 'username';
$arguments177['placeholder'] = 'Username';
$arguments177['class'] = 'form-control';
// Rendering Boolean node
$arguments177['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments177['additionalAttributes'] = NULL;
$arguments177['data'] = NULL;
$arguments177['value'] = NULL;
$arguments177['disabled'] = NULL;
$arguments177['maxlength'] = NULL;
$arguments177['readonly'] = NULL;
$arguments177['size'] = NULL;
$arguments177['autofocus'] = NULL;
$arguments177['errorClass'] = 'f3-form-error';
$arguments177['dir'] = NULL;
$arguments177['id'] = NULL;
$arguments177['lang'] = NULL;
$arguments177['style'] = NULL;
$arguments177['title'] = NULL;
$arguments177['accesskey'] = NULL;
$arguments177['tabindex'] = NULL;
$arguments177['onclick'] = NULL;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper179 = $self->getViewHelper('$viewHelper179', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper179->setArguments($arguments177);
$viewHelper179->setRenderingContext($renderingContext);
$viewHelper179->setRenderChildrenClosure($renderChildrenClosure178);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output167 .= $viewHelper179->initializeArgumentsAndRender();

$output167 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments180 = array();
$arguments180['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.UsernameRegistrationError', $renderingContext);
$arguments180['keepQuotes'] = false;
$arguments180['encoding'] = 'UTF-8';
$arguments180['doubleEncode'] = true;
$renderChildrenClosure181 = function() use ($renderingContext, $self) {
return NULL;
};
$value182 = ($arguments180['value'] !== NULL ? $arguments180['value'] : $renderChildrenClosure181());

$output167 .= (!is_string($value182) ? $value182 : htmlspecialchars($value182, ($arguments180['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments180['encoding'], $arguments180['doubleEncode']));

$output167 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments183 = array();
$arguments183['type'] = 'password';
$arguments183['class'] = 'form-control';
$arguments183['property'] = 'password';
$arguments183['placeholder'] = 'Password';
$arguments183['name'] = 'password';
// Rendering Array
$array184 = array();
$array184['required'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'TRUE', $renderingContext);
$arguments183['additionalAttributes'] = $array184;
$arguments183['data'] = NULL;
$arguments183['required'] = false;
$arguments183['value'] = NULL;
$arguments183['disabled'] = NULL;
$arguments183['maxlength'] = NULL;
$arguments183['readonly'] = NULL;
$arguments183['size'] = NULL;
$arguments183['autofocus'] = NULL;
$arguments183['errorClass'] = 'f3-form-error';
$arguments183['dir'] = NULL;
$arguments183['id'] = NULL;
$arguments183['lang'] = NULL;
$arguments183['style'] = NULL;
$arguments183['title'] = NULL;
$arguments183['accesskey'] = NULL;
$arguments183['tabindex'] = NULL;
$arguments183['onclick'] = NULL;
$renderChildrenClosure185 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper186 = $self->getViewHelper('$viewHelper186', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper186->setArguments($arguments183);
$viewHelper186->setRenderingContext($renderingContext);
$viewHelper186->setRenderChildrenClosure($renderChildrenClosure185);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output167 .= $viewHelper186->initializeArgumentsAndRender();

$output167 .= '
                                        <div class="text-danger">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments187 = array();
$arguments187['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'error.PasswordRegistrationError', $renderingContext);
$arguments187['keepQuotes'] = false;
$arguments187['encoding'] = 'UTF-8';
$arguments187['doubleEncode'] = true;
$renderChildrenClosure188 = function() use ($renderingContext, $self) {
return NULL;
};
$value189 = ($arguments187['value'] !== NULL ? $arguments187['value'] : $renderChildrenClosure188());

$output167 .= (!is_string($value189) ? $value189 : htmlspecialchars($value189, ($arguments187['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments187['encoding'], $arguments187['doubleEncode']));

$output167 .= '
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments190 = array();
$arguments190['property'] = 'gender';
$arguments190['value'] = 'Male';
// Rendering Boolean node
$arguments190['checked'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments190['additionalAttributes'] = NULL;
$arguments190['data'] = NULL;
$arguments190['name'] = NULL;
$arguments190['disabled'] = NULL;
$arguments190['errorClass'] = 'f3-form-error';
$arguments190['class'] = NULL;
$arguments190['dir'] = NULL;
$arguments190['id'] = NULL;
$arguments190['lang'] = NULL;
$arguments190['style'] = NULL;
$arguments190['title'] = NULL;
$arguments190['accesskey'] = NULL;
$arguments190['tabindex'] = NULL;
$arguments190['onclick'] = NULL;
$renderChildrenClosure191 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper192 = $self->getViewHelper('$viewHelper192', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper192->setArguments($arguments190);
$viewHelper192->setRenderingContext($renderingContext);
$viewHelper192->setRenderChildrenClosure($renderChildrenClosure191);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output167 .= $viewHelper192->initializeArgumentsAndRender();

$output167 .= 'Male
                                        </label>
                                        <label class="radio-inline">
                                            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper
$arguments193 = array();
$arguments193['property'] = 'gender';
$arguments193['value'] = 'Female';
$arguments193['additionalAttributes'] = NULL;
$arguments193['data'] = NULL;
$arguments193['checked'] = NULL;
$arguments193['name'] = NULL;
$arguments193['disabled'] = NULL;
$arguments193['errorClass'] = 'f3-form-error';
$arguments193['class'] = NULL;
$arguments193['dir'] = NULL;
$arguments193['id'] = NULL;
$arguments193['lang'] = NULL;
$arguments193['style'] = NULL;
$arguments193['title'] = NULL;
$arguments193['accesskey'] = NULL;
$arguments193['tabindex'] = NULL;
$arguments193['onclick'] = NULL;
$renderChildrenClosure194 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper195 = $self->getViewHelper('$viewHelper195', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper');
$viewHelper195->setArguments($arguments193);
$viewHelper195->setRenderingContext($renderingContext);
$viewHelper195->setRenderChildrenClosure($renderChildrenClosure194);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\RadioViewHelper

$output167 .= $viewHelper195->initializeArgumentsAndRender();

$output167 .= 'Female
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type=\'submit\' class="btn btn-lg btn-primary btn-block" value=\'Signup\' />
                                </fieldset>
                            ';
return $output167;
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper196->setArguments($arguments165);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure166);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output155 .= $viewHelper196->initializeArgumentsAndRender();

$output155 .= '
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
return $output155;
};
$viewHelper197 = $self->getViewHelper('$viewHelper197', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper');
$viewHelper197->setArguments($arguments104);
$viewHelper197->setRenderingContext($renderingContext);
$viewHelper197->setRenderChildrenClosure($renderChildrenClosure105);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper

$output103 .= $viewHelper197->initializeArgumentsAndRender();

$output103 .= '
';
return $output103;
};

$output95 .= '';

$output95 .= '
';

return $output95;
}


}
#0             96293     