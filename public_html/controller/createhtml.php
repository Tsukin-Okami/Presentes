<?php

class Tag
{
    private $comp = "";
    private $tagtype = "";

    public function setTag(string $tagname) {
        $this->tagtype = $tagname;
        $this->addComp($this->tagtype);
    }

    public function addComp(string $toadd) {
        $this->comp .= $toadd;
    }

    public function getTag() {
        return $this->comp;
    }
}

class CreateHtml
{
    public function CapsuleTag(string $tag, string $value) {
        $tagvalue = "<$tag>$value<$tag>";
        return $tagvalue;
    }

    public function CreateList($listaProduto) {



        return $this->CapsuleTag("strong","value");
    }
}