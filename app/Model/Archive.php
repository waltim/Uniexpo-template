<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:28
 */

class Archive extends AppModel{

    public $actsAs = array(
        'MeioUpload' => array(
            'filename' => array(
                'maxSize' => '4 MB',
                'dir' => 'files{DS}uploads',
                'allowedMime' => array(
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/octet-stream',
                    'application/pdf',
                    'text/plain',
                    'application/vnd.oasis.opendocument.text',
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/gif',
                    'image/bmp',
                    'image/x-icon',
                    'image/vnd.microsoft.icon'
                ),
                'allowedExt' => array(
                    '.pdf',
                    '.txt',
                    '.odt',
                    '.zip',
                    '.jpg',
                    '.jpeg',
                    '.png',
                    '.gif',
                    '.bmp',
                    '.ico'
                ),

            ),
        ),
    );

    public $belongsTo = array(

        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
} 