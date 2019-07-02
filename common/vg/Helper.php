<?php


namespace common\vg;


use common\models\Member;

class Helper
{
    /**
     * @param string $tableName
     * @return Member
     * @throws MemberNotFoundException
     */
    public static function getMemberByInfoComTableName(string $tableName): Member
    {
        $memberId = (int)str_replace('aw_info', '', $tableName);
        $member = Member::find()
            ->where(['id' => $memberId])
            ->one();
        if (!$member) {
            throw new MemberNotFoundException("Member with id=$memberId was not found.");
        }
        return $member;
    }
}
