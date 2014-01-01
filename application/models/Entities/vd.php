<?php
namespace Entities;
/**
 * @Entity
 * @Table(name="vd")
 */
class Vd
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(length=140) */
    private $text;
    /** @Column(type="datetime", name="posted_at") */
    private $postedAt;
}