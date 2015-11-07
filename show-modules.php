<?php
if(isset($_POST['modulename']) && strlen(urldecode($_POST['modulename'])))
{
    $redirect_url = urldecode($_POST['modulename']);
    header("Location: $redirect_url");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: Modules</title>
	<?php @require_once("includes/head-section.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
            <h1>Recon-ng Modules</h1><br>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Module Name</th>
                        <th>Module Path</th>
					</tr>
				</thead>
				<tbody>
                    <tr><td><a href='module.php?module_name=discovery/info_disclosure/cache_snoop'>DNS Cache Snooper</a></td><td><a href='module.php?module_name=discovery/info_disclosure/cache_snoop'>discovery/info_disclosure/cache_snoop</a></td></tr>
                    <tr><td><a href='module.php?module_name=discovery/info_disclosure/interesting_files'>Interesting File Finder</a></td><td><a href='module.php?module_name=discovery/info_disclosure/interesting_files'>discovery/info_disclosure/interesting_files</a></td></tr>
                    <tr><td><a href='module.php?module_name=exploitation/injection/command_injector'>Remote Command Injection Shell Interface</a></td><td><a href='module.php?module_name=exploitation/injection/command_injector'>exploitation/injection/command_injector</a></td></tr>
                    <tr><td><a href='module.php?module_name=exploitation/injection/xpath_bruter'>Xpath Injection Brute Forcer</a></td><td><a href='module.php?module_name=exploitation/injection/xpath_bruter'>exploitation/injection/xpath_bruter</a></td></tr>
                    <tr><td><a href='module.php?module_name=import/csv_file'>Advanced CSV File Importer</a></td><td><a href='module.php?module_name=import/csv_file'>import/csv_file</a></td></tr>
                    <tr><td><a href='module.php?module_name=import/list'>List File Importer</a></td><td><a href='module.php?module_name=import/list'>import/list</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/point_usage'>Jigsaw - Point Usage Statistics Fetcher</a></td><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/point_usage'>recon/companies-contacts/jigsaw/point_usage</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/purchase_contact'>Jigsaw - Single Contact Retriever</a></td><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/purchase_contact'>recon/companies-contacts/jigsaw/purchase_contact</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/search_contacts'>Jigsaw Contact Enumerator</a></td><td><a href='module.php?module_name=recon/companies-contacts/jigsaw/search_contacts'>recon/companies-contacts/jigsaw/search_contacts</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-contacts/jigsaw_auth'>Jigsaw Authenticated Contact Enumerator</a></td><td><a href='module.php?module_name=recon/companies-contacts/jigsaw_auth'>recon/companies-contacts/jigsaw_auth</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-contacts/linkedin_auth'>LinkedIn Authenticated Contact Enumerator</a></td><td><a href='module.php?module_name=recon/companies-contacts/linkedin_auth'>recon/companies-contacts/linkedin_auth</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-multi/github_miner'>Github Resource Miner</a></td><td><a href='module.php?module_name=recon/companies-multi/github_miner'>recon/companies-multi/github_miner</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-multi/whois_miner'>Whois Data Miner</a></td><td><a href='module.php?module_name=recon/companies-multi/whois_miner'>recon/companies-multi/whois_miner</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/companies-profiles/bing_linkedin'>Bing Linkedin Profile Harvester</a></td><td><a href='module.php?module_name=recon/companies-profiles/bing_linkedin'>recon/companies-profiles/bing_linkedin</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-contacts/mailtester'>MailTester Email Validator</a></td><td><a href='module.php?module_name=recon/contacts-contacts/mailtester'>recon/contacts-contacts/mailtester</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-contacts/mangle'>Contact Name Mangler</a></td><td><a href='module.php?module_name=recon/contacts-contacts/mangle'>recon/contacts-contacts/mangle</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-contacts/unmangle'>Contact Name Unmangler</a></td><td><a href='module.php?module_name=recon/contacts-contacts/unmangle'>recon/contacts-contacts/unmangle</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-credentials/hibp_breach'>Have I been pwned? Breach Search</a></td><td><a href='module.php?module_name=recon/contacts-credentials/hibp_breach'>recon/contacts-credentials/hibp_breach</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-credentials/hibp_paste'>Have I been pwned? Paste Search</a></td><td><a href='module.php?module_name=recon/contacts-credentials/hibp_paste'>recon/contacts-credentials/hibp_paste</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-credentials/pwnedlist'>PwnedList Validator</a></td><td><a href='module.php?module_name=recon/contacts-credentials/pwnedlist'>recon/contacts-credentials/pwnedlist</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-domains/migrate_contacts'>Contacts to Domains Data Migrator</a></td><td><a href='module.php?module_name=recon/contacts-domains/migrate_contacts'>recon/contacts-domains/migrate_contacts</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/contacts-profiles/fullcontact'>FullContact Contact Enumerator</a></td><td><a href='module.php?module_name=recon/contacts-profiles/fullcontact'>recon/contacts-profiles/fullcontact</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/credentials-credentials/adobe'>Adobe Hash Cracker</a></td><td><a href='module.php?module_name=recon/credentials-credentials/adobe'>recon/credentials-credentials/adobe</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/credentials-credentials/bozocrack'>PyBozoCrack Hash Lookup</a></td><td><a href='module.php?module_name=recon/credentials-credentials/bozocrack'>recon/credentials-credentials/bozocrack</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/credentials-credentials/hashes_org'>Hashes.org Hash Lookup</a></td><td><a href='module.php?module_name=recon/credentials-credentials/hashes_org'>recon/credentials-credentials/hashes_org</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/credentials-credentials/leakdb'>leakdb Hash Lookup</a></td><td><a href='module.php?module_name=recon/credentials-credentials/leakdb'>recon/credentials-credentials/leakdb</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-contacts/metacrawler'>Meta Data Extractor</a></td><td><a href='module.php?module_name=recon/domains-contacts/metacrawler'>recon/domains-contacts/metacrawler</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-contacts/pgp_search'>PGP Key Owner Lookup</a></td><td><a href='module.php?module_name=recon/domains-contacts/pgp_search'>recon/domains-contacts/pgp_search</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-contacts/salesmaple'>SalesMaple Contact Harvester</a></td><td><a href='module.php?module_name=recon/domains-contacts/salesmaple'>recon/domains-contacts/salesmaple</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-contacts/whois_pocs'>Whois POC Harvester</a></td><td><a href='module.php?module_name=recon/domains-contacts/whois_pocs'>recon/domains-contacts/whois_pocs</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/account_creds'>PwnedList - Account Credentials Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/account_creds'>recon/domains-credentials/pwnedlist/account_creds</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/api_usage'>PwnedList - API Usage Statistics Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/api_usage'>recon/domains-credentials/pwnedlist/api_usage</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/domain_creds'>PwnedList - Pwned Domain Credentials Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/domain_creds'>recon/domains-credentials/pwnedlist/domain_creds</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/domain_ispwned'>PwnedList - Pwned Domain Statistics Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/domain_ispwned'>recon/domains-credentials/pwnedlist/domain_ispwned</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/leak_lookup'>PwnedList - Leak Details Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/leak_lookup'>recon/domains-credentials/pwnedlist/leak_lookup</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/leaks_dump'>PwnedList - Leak Details Fetcher</a></td><td><a href='module.php?module_name=recon/domains-credentials/pwnedlist/leaks_dump'>recon/domains-credentials/pwnedlist/leaks_dump</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-domains/brute_suffix'>DNS Public Suffix Brute Forcer</a></td><td><a href='module.php?module_name=recon/domains-domains/brute_suffix'>recon/domains-domains/brute_suffix</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/baidu_site'>Baidu Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/baidu_site'>recon/domains-hosts/baidu_site</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/bing_domain_api'>Bing API Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/bing_domain_api'>recon/domains-hosts/bing_domain_api</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/bing_domain_web'>Bing Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/bing_domain_web'>recon/domains-hosts/bing_domain_web</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/brute_hosts'>DNS Hostname Brute Forcer</a></td><td><a href='module.php?module_name=recon/domains-hosts/brute_hosts'>recon/domains-hosts/brute_hosts</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/builtwith'>BuiltWith Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/builtwith'>recon/domains-hosts/builtwith</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/google_site_api'>Google CSE Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/google_site_api'>recon/domains-hosts/google_site_api</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/google_site_web'>Google Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/google_site_web'>recon/domains-hosts/google_site_web</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/netcraft'>Netcraft Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/netcraft'>recon/domains-hosts/netcraft</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/shodan_hostname'>Shodan Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/shodan_hostname'>recon/domains-hosts/shodan_hostname</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/ssl_san'>SSL SAN Lookup</a></td><td><a href='module.php?module_name=recon/domains-hosts/ssl_san'>recon/domains-hosts/ssl_san</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/vpnhunter'>VPNHunter Lookup</a></td><td><a href='module.php?module_name=recon/domains-hosts/vpnhunter'>recon/domains-hosts/vpnhunter</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-hosts/yahoo_domain'>Yahoo Hostname Enumerator</a></td><td><a href='module.php?module_name=recon/domains-hosts/yahoo_domain'>recon/domains-hosts/yahoo_domain</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-vulnerabilities/ghdb'>Google Hacking Database</a></td><td><a href='module.php?module_name=recon/domains-vulnerabilities/ghdb'>recon/domains-vulnerabilities/ghdb</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-vulnerabilities/punkspider'>PunkSPIDER Vulnerabilty Finder</a></td><td><a href='module.php?module_name=recon/domains-vulnerabilities/punkspider'>recon/domains-vulnerabilities/punkspider</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-vulnerabilities/xssed'>XSSed Domain Lookup</a></td><td><a href='module.php?module_name=recon/domains-vulnerabilities/xssed'>recon/domains-vulnerabilities/xssed</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/domains-vulnerabilities/xssposed'>XSSposed Domain Lookup</a></td><td><a href='module.php?module_name=recon/domains-vulnerabilities/xssposed'>recon/domains-vulnerabilities/xssposed</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-domains/migrate_hosts'>Hosts to Domains Data Migrator</a></td><td><a href='module.php?module_name=recon/hosts-domains/migrate_hosts'>recon/hosts-domains/migrate_hosts</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/bing_ip'>Bing API IP Neighbor Enumerator</a></td><td><a href='module.php?module_name=recon/hosts-hosts/bing_ip'>recon/hosts-hosts/bing_ip</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/freegeoip'>FreeGeoIP</a></td><td><a href='module.php?module_name=recon/hosts-hosts/freegeoip'>recon/hosts-hosts/freegeoip</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/ip_neighbor'>My-IP-Neighbors.com Lookup</a></td><td><a href='module.php?module_name=recon/hosts-hosts/ip_neighbor'>recon/hosts-hosts/ip_neighbor</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/ipinfodb'>IPInfoDB GeoIP</a></td><td><a href='module.php?module_name=recon/hosts-hosts/ipinfodb'>recon/hosts-hosts/ipinfodb</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/resolve'>Hostname Resolver</a></td><td><a href='module.php?module_name=recon/hosts-hosts/resolve'>recon/hosts-hosts/resolve</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/hosts-hosts/reverse_resolve'>Reverse Resolver</a></td><td><a href='module.php?module_name=recon/hosts-hosts/reverse_resolve'>recon/hosts-hosts/reverse_resolve</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-locations/geocode'>Address Geocoder</a></td><td><a href='module.php?module_name=recon/locations-locations/geocode'>recon/locations-locations/geocode</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-locations/reverse_geocode'>Reverse Geocoder</a></td><td><a href='module.php?module_name=recon/locations-locations/reverse_geocode'>recon/locations-locations/reverse_geocode</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-pushpins/flickr'>Flickr Geolocation Search</a></td><td><a href='module.php?module_name=recon/locations-pushpins/flickr'>recon/locations-pushpins/flickr</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-pushpins/instagram'>Instagram Geolocation Search</a></td><td><a href='module.php?module_name=recon/locations-pushpins/instagram'>recon/locations-pushpins/instagram</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-pushpins/picasa'>Picasa Geolocation Search</a></td><td><a href='module.php?module_name=recon/locations-pushpins/picasa'>recon/locations-pushpins/picasa</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-pushpins/shodan'>Shodan Geolocation Search</a></td><td><a href='module.php?module_name=recon/locations-pushpins/shodan'>recon/locations-pushpins/shodan</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/locations-pushpins/twitter'>Twitter Geolocation Search</a></td><td><a href='module.php?module_name=recon/locations-pushpins/twitter'>recon/locations-pushpins/twitter</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/netblocks-companies/whois_orgs'>Whois Company Harvester</a></td><td><a href='module.php?module_name=recon/netblocks-companies/whois_orgs'>recon/netblocks-companies/whois_orgs</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/netblocks-hosts/reverse_resolve'>Reverse Resolver</a></td><td><a href='module.php?module_name=recon/netblocks-hosts/reverse_resolve'>recon/netblocks-hosts/reverse_resolve</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/netblocks-hosts/shodan_net'>Shodan Network Enumerator</a></td><td><a href='module.php?module_name=recon/netblocks-hosts/shodan_net'>recon/netblocks-hosts/shodan_net</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/netblocks-ports/census_2012'>Internet Census 2012 Lookup</a></td><td><a href='module.php?module_name=recon/netblocks-ports/census_2012'>recon/netblocks-ports/census_2012</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/ports-hosts/migrate_ports'>Ports to Hosts Data Migrator</a></td><td><a href='module.php?module_name=recon/ports-hosts/migrate_ports'>recon/ports-hosts/migrate_ports</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-contacts/dev_diver'>Dev Diver Repository Activity Examiner</a></td><td><a href='module.php?module_name=recon/profiles-contacts/dev_diver'>recon/profiles-contacts/dev_diver</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-contacts/linkedin'>Linkedin Contact Crawler</a></td><td><a href='module.php?module_name=recon/profiles-contacts/linkedin'>recon/profiles-contacts/linkedin</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-profiles/linkedin_crawl'>Linkedin Profile Crawler</a></td><td><a href='module.php?module_name=recon/profiles-profiles/linkedin_crawl'>recon/profiles-profiles/linkedin_crawl</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-profiles/namechk'>NameChk.com Username Validator</a></td><td><a href='module.php?module_name=recon/profiles-profiles/namechk'>recon/profiles-profiles/namechk</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-profiles/profiler'>OSINT HUMINT Profile Collector</a></td><td><a href='module.php?module_name=recon/profiles-profiles/profiler'>recon/profiles-profiles/profiler</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-profiles/twitter'>Twitter Handles</a></td><td><a href='module.php?module_name=recon/profiles-profiles/twitter'>recon/profiles-profiles/twitter</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/profiles-repositories/github_repos'>Github Code Enumerator</a></td><td><a href='module.php?module_name=recon/profiles-repositories/github_repos'>recon/profiles-repositories/github_repos</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/repositories-vulnerabilities/gists_search'>Github Gist Searcher</a></td><td><a href='module.php?module_name=recon/repositories-vulnerabilities/gists_search'>recon/repositories-vulnerabilities/gists_search</a></td></tr>
                    <tr><td><a href='module.php?module_name=recon/repositories-vulnerabilities/github_dorks'>Github Dork Analyzer</a></td><td><a href='module.php?module_name=recon/repositories-vulnerabilities/github_dorks'>recon/repositories-vulnerabilities/github_dorks</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/csv'>CSV File Creator</a></td><td><a href='module.php?module_name=reporting/csv'>reporting/csv</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/html'>HTML Report Generator</a></td><td><a href='module.php?module_name=reporting/html'>reporting/html</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/json'>JSON Report Generator</a></td><td><a href='module.php?module_name=reporting/json'>reporting/json</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/list'>List Creator</a></td><td><a href='module.php?module_name=reporting/list'>reporting/list</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/pushpin'>PushPin Report Generator</a></td><td><a href='module.php?module_name=reporting/pushpin'>reporting/pushpin</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/xlsx'>XLSX File Creator</a></td><td><a href='module.php?module_name=reporting/xlsx'>reporting/xlsx</a></td></tr>
                    <tr><td><a href='module.php?module_name=reporting/xml'>XML Report Generator</a></td><td><a href='module.php?module_name=reporting/xml'>reporting/xml</a></td></tr>
                </tbody>
            </table>    
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').dataTable({
        "order": [[ 1, "asc" ]]
    });
		} );
</script>
</body>
</html>
