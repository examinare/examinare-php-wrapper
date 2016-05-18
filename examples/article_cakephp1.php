

echo $this->Form->create();
echo $this->Form->input('firstname', array('label' => 'Enter your name:'));
echo $this->Form->input('email', array('label' => 'Enter your email address:'));
echo $this->Form->end('Take the Survey');
