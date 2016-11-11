<?php
namespace AppBundle\Entity\Manager;

use App\CoreBundle\Entity\Manager\AbstractGenericManager;
use App\CoreBundle\Repository\AbstractGenericRepository;
use AppBundle\Entity\Manager\Interfaces\CategoryManagerInterface;
use AppBundle\Entity\Manager\Interfaces\ManagerInterface;

class CategoryManager extends AbstractGenericManager implements CategoryManagerInterface, ManagerInterface
{
    /**
     * @inheritdoc
     */
    public function __construct(AbstractGenericRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return 'categoryManager';
    }
}
