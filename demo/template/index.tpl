{include file="header.tpl" title='模板测试哈'}
{$Name}

<pre>
{section name=outer loop=$FirstName}
{if $smarty.section.outer.index is odd by 2}
	{$smarty.section.outer.rownum} . {$FirstName[outer]} {$LastName[outer]}
{else}
	{$smarty.section.outer.rownum} * {$FirstName[outer]} {$LastName[outer]}
{/if}
{sectionelse}
   没有选择
{/section}
{include file="footer.tpl"}