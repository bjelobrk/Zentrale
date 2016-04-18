<?php
namespace Acme\CentralaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="Card")
 * @ORM\Entity(repositoryClass="Acme\CentralaBundle\Entity\CardRepository")
*/
class Card
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    protected $id;
    
     /**
     * @ORM\Column (type="string", length=50)
     * @Assert\File(maxSize="6000000")
     */
     
    
    protected $cardFile;
      /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;
       /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    protected $path;
         /**
     * @var string
     *
     * @ORM\Column(name="fullPath", type="string", length=255)
     */
    protected $fullPath;

    public function setCardFile(File $file = null)
    {
        $this->cardFile = $file;
    }

    public function getCardFile()
    {
        return $this->cardFile;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    public function upload()
     {
    // the file property can be empty if the field is not required
    if (null === $this->getCardFile()) {
        return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
        $this->getCardFile()->move(
        $this->getUploadRootDir(),
        $this->getCardFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->name = $this->getCardFile()->getClientOriginalName();
    $this->fullPath=$this->path.'/'.$this->name;
}
protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return $this->path =__DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/vcards';
    }

   


    /**
     * Set path
     *
     * @param string $path
     * @return Card
     */
    public function setName($path)
    {
        $this->name = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Card
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set fullPath
     *
     * @param string $fullPath
     * @return Card
     */
    public function setFullPath($fullPath)
    {
        $this->fullPath = $fullPath;

        return $this;
    }

    /**
     * Get fullPath
     *
     * @return string 
     */
    public function getFullPath()
    {
        return $this->fullPath;
    }
}
