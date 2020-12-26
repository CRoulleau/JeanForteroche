<?php


class Comment
{

        private $_id;
        private $_post_id;
        private $_author;
        private $_comment;
        private $_comment_date;


/**
     * Constructeur qui hydrate nos instances
     *
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * Hydratation des setters
     *
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //getter et setter


        

        /**
         * Get the value of _id
         */ 
        public function getId()
        {
                return $this->_id;
        }

        /**
         * Set the value of _id
         *
         * @return  self
         */ 
        public function setId($_id)
        {
                $this->_id = $_id;

                return $this;
        }

        /**
         * Get the value of _post_id
         */ 
        public function getPostId()
        {
                return $this->_post_id;
        }

        /**
         * Set the value of _post_id
         *
         * @return  self
         */ 
        public function setPostId($_post_id)
        {
                $this->_post_id = $_post_id;

                return $this;
        }

        /**
         * Get the value of _author
         */ 
        public function getAuthor()
        {
                return $this->_author;
        }

        /**
         * Set the value of _author
         *
         * @return  self
         */ 
        public function setAuthor($_author)
        {
                $this->_author = $_author;

                return $this;
        }

        /**
         * Get the value of _comment
         */ 
        public function getComment()
        {
                return $this->_comment;
        }

        /**
         * Set the value of _comment
         *
         * @return  self
         */ 
        public function setComment($_comment)
        {
                $this->_comment = $_comment;

                return $this;
        }

        /**
         * Get the value of _comment_date
         */ 
        public function getCommentDate()
        {
                return $this->_comment_date;
        }

        /**
         * Set the value of _comment_date
         *
         * @return  self
         */ 
        public function setCommentDate($_comment_date)
        {
                $this->_comment_date = $_comment_date;

                return $this;
        }
}//fin class 







?>