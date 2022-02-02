<?php

	class Node implements NodeInterface
	{
        private $name;
        private $children = [];

		public function __construct(string $name)
        {
            $this -> name = $name;
        }
        public function __toString(): string
        {
            return $this->name;
        }
        public function getName(): string
        {
            return $this->name;
        }
        public function getChildren(): array
        {
          
               return $this->children;

        }
        public function addChild(Node $node): NodeInterface
        {
            $this->children[]=$this;
            return $this;
        }
	}
?>