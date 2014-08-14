<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcipatientadmission_npostatus".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $time_last_ate
 * @property string $time_last_drank
 * @property integer $procedure_verified
 * @property integer $site_verified
 * @property integer $site_id
 * @property integer $signed_and_witnessed
 * @property integer $type_of_surgery
 * @property integer $site_marked_by_x
 * @property integer $site_marked_by_id
 * @property integer $iol_measurements_verified_id
 * @property integer $iol_selected_id
 * @property string $comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property Procedure $procedure
 * @property Site $site
 * @property User $site_marked_by
 * @property OphCIPatientAdmission_NpoStatus_IolMeasurementsVerified $iol_measurements_verified
 * @property OphCIPatientAdmission_NpoStatus_IolSelected $iol_selected
 *
 */

class Element_OphCiPatientadmission_Verification extends BaseEventTypeElement
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcipatientadmission_verification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, procedure_verified_id, site_verified_id, signed_and_witnessed, type_of_surgery, site_marked_by_x_id, site_marked_by_id, correct_site_confirmed', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'site_marked_by' => array(self::BELONGS_TO, 'User', 'site_marked_by_id'),
			'procedure_verified' => array(self::BELONGS_TO, 'OphCiPatientadmission_Procedure_Verified', 'procedure_verified_id'),
			'site_verified' => array(self::BELONGS_TO, 'OphCiPatientadmission_Site_Verified', 'site_verified_id'),
			'site_marked_by_x' => array(self::BELONGS_TO, 'OphCiPatientadmission_Site_Marked_By_X', 'site_marked_by_x_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'procedure_verified_id' => 'Procedure verified',
			'site_verified_id' => 'Site verified',
			'signed_and_witnessed' => 'Signed and witnessed',
			'type_of_surgery' => 'Type of surgery',
			'site_marked_by_x_id' => 'Site marked by X by operating surgeon or staff ophthalmologist',
			'site_marked_by_id' => 'Site marked by',
			'correct_site_confirmed' => 'Correct site confirmed',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('time_last_ate', $this->time_last_ate);
		$criteria->compare('time_last_drank', $this->time_last_drank);
		$criteria->compare('procedure_verified_id', $this->procedure_verified_id);
		$criteria->compare('site_verified_id', $this->site_verified_id);
		$criteria->compare('eye_id', $this->eye_id);
		$criteria->compare('signed_and_witnessed', $this->signed_and_witnessed);
		$criteria->compare('type_of_surgery', $this->type_of_surgery);
		$criteria->compare('site_marked_by_x_id', $this->site_marked_by_x_id);
		$criteria->compare('site_marked_by_id', $this->site_marked_by_id);
		$criteria->compare('iol_measurements_verified_id', $this->iol_measurements_verified);
		$criteria->compare('iol_selected_id', $this->iol_selected);
		$criteria->compare('comments', $this->comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}
?>
